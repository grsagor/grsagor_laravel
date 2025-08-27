<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ExperienceController extends Controller
{
    public function index()
    {
        return view('backend.pages.experiences.index');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Experience::select(['id', 'title', 'company', 'logo', 'start_date', 'end_date', 'description', 'status'])->get();

            return DataTables::of($data)
                ->addColumn('logo', function ($row) {
                    if ($row->logo) {
                        return '<img src="' . asset($row->logo) . '" alt="Company Logo" style="height:40px;">';
                    }
                    return '';
                })
                ->addColumn('status', function ($row) {
                    return $row->status == 1
                        ? '<span class="badge bg-success">Active</span>'
                        : '<span class="badge bg-secondary">Inactive</span>';
                })
                ->addColumn('action', function ($row) {
                    $actionBtn  = '<button class="edit btn btn-success btn-sm edit_btn" data-url="' . route('admin.experiences.edit', $row->id) . '">Edit</button> ';
                    $actionBtn .= '<button class="delete btn btn-danger btn-sm delete_btn" data-url="' . route('admin.experiences.delete', $row->id) . '">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['logo', 'status', 'action'])
                ->make(true);
        }
    }

    public function create()
    {
        $html = view('backend.pages.experiences.create')->render();
        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'company'     => 'required|string|max:255',
            'logo'        => 'nullable|file|max:2048',
            'start_date'  => 'required|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'status'      => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors'  => $validator->errors()
            ], 422);
        }

        try {
            $logo_path = '';
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $filename = time() . uniqid() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('uploads/company-logos'), $filename);
                $logo_path = 'uploads/company-logos/' . $filename;
            }

            Experience::create([
                'title'       => $request->title,
                'company'     => $request->company,
                'logo'        => $logo_path,
                'start_date'  => $request->start_date,
                'end_date'    => $request->end_date,
                'description' => $request->description,
                'status'      => $request->status ?? 1,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Experience created successfully',
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
        $experience = Experience::findOrFail($id);
        $html = view('backend.pages.experiences.edit', compact('experience'))->render();
        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'company'     => 'required|string|max:255',
            'logo'        => 'nullable|file|max:2048',
            'start_date'  => 'required|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'status'      => 'nullable|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $experience = Experience::findOrFail($id);

            // Handle logo update
            if ($request->hasFile('logo')) {
                // Delete old logo if exists
                if ($experience->logo && file_exists(public_path($experience->logo))) {
                    unlink(public_path($experience->logo));
                }

                $logo = $request->file('logo');
                $filename = time() . uniqid() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('uploads/company-logos'), $filename);
                $experience->logo = 'uploads/company-logos/' . $filename;
            }

            // Update other fields
            $experience->title       = $request->title;
            $experience->company     = $request->company;
            $experience->start_date  = $request->start_date;
            $experience->end_date    = $request->end_date;
            $experience->description = $request->description;
            $experience->status      = $request->status ?? $experience->status;

            $experience->save();

            return response()->json([
                'success' => true,
                'message' => 'Experience updated successfully',
                'data'    => $experience
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
            $experience = Experience::findOrFail($id);
            if ($experience->logo && file_exists(public_path($experience->logo))) {
                unlink(public_path($experience->logo));
            }
            $experience->delete();

            return response()->json([
                'success' => true,
                'message' => 'Experience deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!'
            ], 500);
        }
    }
}
