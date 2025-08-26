<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    public function index()
    {
        return view('backend.pages.projects.index');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Project::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="edit btn btn-success btn-sm edit_btn" data-url="' . route('admin.projects.edit', ['id' => $row->id]) . '">Edit</button> ';
                    $actionBtn .= '<button class="delete btn btn-danger btn-sm delete_btn" data-url="' . route('admin.projects.delete', ['id' => $row->id]) . '">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        $html = view('backend.pages.projects.create')->render();
        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|file|max:2048',
            'github' => 'nullable|string|max:255',
            'live' => 'nullable|string|max:255',
            'status' => 'nullable|integer',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $image_path = '';
            if ($request->hasFile('image')) {
                // if (file_exists(public_path('uploads/project-images/' . $user->image))) {
                //     unlink(public_path('uploads/project-images/' . $user->image));
                // }
                $image = $request->file('image');
                $filename = time() . uniqid() . $image->getClientOriginalName();
                $image->move(public_path('uploads/project-images'), $filename);
                $image_path = 'uploads/project-images/' . $filename;
            }

            Project::create([
                'client_id' => $request->client_id,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $image_path,
                'github' => $request->github,
                'live' => $request->live,
                'status' => $request->status ?? 1,
                'order' => $request->order ?? 0,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Project created successfully',
                'data' => $request->all(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $html = view('backend.pages.projects.edit', compact('project'))->render();
        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|file|max:2048',
            'github' => 'nullable|string|max:255',
            'live' => 'nullable|string|max:255',
            'status' => 'nullable|integer',
            'order' => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $project = Project::findOrFail($id);

            $image_path = $project->image;
            if ($request->hasFile('image')) {
                if ($project->image && file_exists(public_path($project->image))) {
                    unlink(public_path($project->image));
                }
                $image = $request->file('image');
                $filename = time() . uniqid() . $image->getClientOriginalName();
                $image->move(public_path('uploads/project-images'), $filename);
                $image_path = 'uploads/project-images/' . $filename;
            }

            $project->update([
                'client_id' => $request->client_id,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $image_path,
                'github' => $request->github,
                'live' => $request->live,
                'status' => $request->status ? 1 : 0,
                'order' => $request->order ?? 0,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Project updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!'
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $project = Project::findOrFail($id);
            if (file_exists(public_path('uploads/project-images/' . $project->image))) {
                unlink(public_path('uploads/project-images/' . $project->image));
            }
            $project->delete();

            return response()->json([
                'success' => true,
                'message' => 'Project deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!'
            ], 500);
        }
    }
}
