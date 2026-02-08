<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('contacts')) {
            Schema::create('contacts', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email');
                $table->string('subject');
                $table->text('message');
                $table->boolean('is_read')->default(false);
                $table->timestamps();
            });
        } else {
            // Table exists, check and add missing columns
            Schema::table('contacts', function (Blueprint $table) {
                if (!Schema::hasColumn('contacts', 'name')) {
                    $table->string('name')->after('id');
                }
                if (!Schema::hasColumn('contacts', 'email')) {
                    $table->string('email')->after('name');
                }
                if (!Schema::hasColumn('contacts', 'subject')) {
                    $table->string('subject')->after('email');
                }
                if (!Schema::hasColumn('contacts', 'message')) {
                    $table->text('message')->after('subject');
                }
                if (!Schema::hasColumn('contacts', 'is_read')) {
                    $table->boolean('is_read')->default(false)->after('message');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
