<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    protected $fillable = [
        'client_id',
        'title',
        'description',
        'image',
        'github',
        'live',
        'status',
        'order',
    ];

    protected static function booted(): void
    {
        static::creating(function (Project $project) {
            $requestedOrder = (int) ($project->order ?? 0);
            $maxOrder = (int) DB::table('projects')->max('order');
            $nextOrder = $maxOrder > 0 ? $maxOrder + 1 : 1;

            // If order is 0 (or less), place it at the end as latest.
            if ($requestedOrder <= 0) {
                $project->order = $nextOrder;
                return;
            }

            // Clamp order within valid range.
            $targetOrder = min($requestedOrder, $nextOrder);

            // Shift all projects from target order and beyond.
            DB::table('projects')
                ->where('order', '>=', $targetOrder)
                ->increment('order');

            $project->order = $targetOrder;
        });

        static::updating(function (Project $project) {
            if (! $project->isDirty('order')) {
                return;
            }

            $oldOrder = (int) $project->getOriginal('order');
            $requestedOrder = (int) ($project->order ?? 0);

            if ($oldOrder <= 0) {
                $oldOrder = 1;
            }

            $maxOrder = (int) DB::table('projects')
                ->where('id', '!=', $project->id)
                ->max('order');
            $lastAvailableOrder = $maxOrder > 0 ? $maxOrder + 1 : 1;

            // 0 or negative means move to latest position.
            if ($requestedOrder <= 0) {
                $newOrder = $lastAvailableOrder;
            } else {
                $newOrder = min($requestedOrder, $lastAvailableOrder);
            }

            if ($newOrder === $oldOrder) {
                $project->order = $oldOrder;
                return;
            }

            // Moving down: 2 -> 4 means [3,4] shift up by 1.
            if ($newOrder > $oldOrder) {
                DB::table('projects')
                    ->where('id', '!=', $project->id)
                    ->whereBetween('order', [$oldOrder + 1, $newOrder])
                    ->decrement('order');
            } else {
                // Moving up: 4 -> 2 means [2,3] shift down by 1.
                DB::table('projects')
                    ->where('id', '!=', $project->id)
                    ->whereBetween('order', [$newOrder, $oldOrder - 1])
                    ->increment('order');
            }

            $project->order = $newOrder;
        });

        static::deleting(function (Project $project) {
            $deletedOrder = (int) $project->order;

            if ($deletedOrder <= 0) {
                return;
            }

            DB::table('projects')
                ->where('id', '!=', $project->id)
                ->where('order', '>', $deletedOrder)
                ->decrement('order');
        });
    }
}
