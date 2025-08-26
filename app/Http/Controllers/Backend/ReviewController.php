<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ReviewController extends Controller
{
    public function index()
    {
        return view('backend.pages.reviews.index');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Review::all();
            return DataTables::of($data)
                ->addColumn('reviewer_name', function ($row) {
                    return $row->reviewer->name;
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="edit btn btn-success btn-sm edit_btn" data-url="' . route('admin.reviews.edit', ['id' => $row->id]) . '">Edit</button> ';
                    $actionBtn .= '<button class="delete btn btn-danger btn-sm delete_btn" data-url="' . route('admin.reviews.delete', ['id' => $row->id]) . '">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        $clients = User::clients()->get();
        $html = view('backend.pages.reviews.create', compact('clients'))->render();
        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'reviewer_id' => 'required|exists:users,id',
            'review'      => 'required|string',
            'rating'      => 'required|integer|min:1|max:5',
            'status'      => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        try {
            Review::create([
                'reviewer_id' => $request->reviewer_id,
                'review'      => $request->review,
                'rating'      => $request->rating,
                'status'      => $request->status,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Review created successfully'
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
        $clients = User::clients()->get();
        $review = Review::with('reviewer')->findOrFail($id);
        $html = view('backend.pages.reviews.edit', compact('review', 'clients'))->render();
        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'reviewer_id' => 'required|exists:users,id',
            'review'      => 'required|string',
            'rating'      => 'required|integer|min:1|max:5',
            'status'      => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        try {
            $review = Review::findOrFail($id);
            $review->update([
                'reviewer_id' => $request->reviewer_id,
                'review'      => $request->review,
                'rating'      => $request->rating,
                'status'      => $request->status,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Review updated successfully'
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
            $review = Review::findOrFail($id);
            $review->delete();

            return response()->json([
                'success' => true,
                'message' => 'Review deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!'
            ], 500);
        }
    }
}
