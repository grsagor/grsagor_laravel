<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    public function index()
    {
        return view('backend.pages.blogs.index');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::select(['id', 'title', 'short_description', 'image', 'date', 'url', 'status'])->get();

            return DataTables::of($data)
                ->addColumn('image', function ($row) {
                    if ($row->image) {
                        return '<img src="' . asset($row->image) . '" alt="Blog Image" style="height:40px;">';
                    }
                    return '';
                })
                ->addColumn('status', function ($row) {
                    return $row->status == 1
                        ? '<span class="badge bg-success">Active</span>'
                        : '<span class="badge bg-secondary">Inactive</span>';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn  = '<button class="edit btn btn-success btn-sm edit_btn" data-url="' . route('admin.blogs.edit', $row->id) . '">Edit</button> ';
                    $actionBtn .= '<button class="delete btn btn-danger btn-sm delete_btn" data-url="' . route('admin.blogs.delete', $row->id) . '">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['image', 'status', 'action'])
                ->make(true);
        }
    }


    public function create()
    {
        $html = view('backend.pages.blogs.create')->render();
        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'             => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'image'             => 'required|file|max:2048',
            'date'              => 'nullable|date',
            'url'               => 'nullable|string|max:255',
            'status'            => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        try {
            $image_path = '';
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/blog-images'), $filename);
                $image_path = 'uploads/blog-images/' . $filename;
            }

            Blog::create([
                'title'             => $request->title,
                'short_description' => $request->short_description,
                'image'             => $image_path,
                'date'              => $request->date ?? now(),
                'url'               => $request->url,
                'status'            => $request->status ?? 1,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Blog created successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!',
                'error'   => $e->getMessage()
            ], 500);
        }
    }


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $html = view('backend.pages.blogs.edit', compact('blog'))->render();
        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'             => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'image'             => 'nullable|file|max:2048',
            'date'              => 'nullable|date',
            'url'               => 'nullable|string|max:255',
            'status'            => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $blog = Blog::findOrFail($id);

            // Handle image update
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($blog->image && file_exists(public_path($blog->image))) {
                    unlink(public_path($blog->image));
                }

                $image = $request->file('image');
                $filename = time() . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/blog-images'), $filename);
                $blog->image = 'uploads/blog-images/' . $filename;
            }

            // Update other fields
            $blog->title             = $request->title;
            $blog->short_description = $request->short_description;
            $blog->date              = $request->date ?? $blog->date;
            $blog->url               = $request->url ?? $blog->url;
            $blog->status            = $request->status ?? $blog->status;

            $blog->save();

            return response()->json([
                'success' => true,
                'message' => 'Blog updated successfully',
                'data'    => $blog
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $blog = Blog::findOrFail($id);
            if (file_exists(public_path('uploads/blog-images/' . $blog->image))) {
                unlink(public_path('uploads/blog-images/' . $blog->image));
            }
            $blog->delete();

            return response()->json([
                'success' => true,
                'message' => 'Blog deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!'
            ], 500);
        }
    }
}
