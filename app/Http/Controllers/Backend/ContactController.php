<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    public function index()
    {
        return view('backend.pages.contacts.index');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Contact::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('status_badge', function ($row) {
                    if ($row->is_read) {
                        return '<span class="badge bg-success">Read</span>';
                    } else {
                        return '<span class="badge bg-warning">Unread</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    $actionBtn = '<button class="view btn btn-info btn-sm view_btn" data-url="'. route('admin.contacts.view', ['id' => $row->id]) .'">View</button> ';
                    if (!$row->is_read) {
                        $actionBtn .= '<button class="mark-read btn btn-success btn-sm mark_read_btn" data-url="'. route('admin.contacts.mark-read', ['id' => $row->id]) .'">Mark Read</button> ';
                    } else {
                        $actionBtn .= '<button class="mark-unread btn btn-warning btn-sm mark_unread_btn" data-url="'. route('admin.contacts.mark-unread', ['id' => $row->id]) .'">Mark Unread</button> ';
                    }
                    $actionBtn .= '<button class="delete btn btn-danger btn-sm delete_btn" data-url="'. route('admin.contacts.delete', ['id' => $row->id]) .'">Delete</button>';
                    return $actionBtn;
                })
                ->rawColumns(['status_badge', 'action'])
                ->make(true);
        }
    }

    public function view($id)
    {
        $contact = Contact::findOrFail($id);
        // Mark as read when viewing
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }
        $html = view('backend.pages.contacts.view', compact('contact'))->render();
        return response()->json(['html' => $html]);
    }

    public function markRead($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->update(['is_read' => true]);

            return response()->json([
                'success' => true,
                'message' => 'Contact marked as read successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!'
            ], 500);
        }
    }

    public function markUnread($id)
    {
        try {
            $contact = Contact::findOrFail($id);
            $contact->update(['is_read' => false]);

            return response()->json([
                'success' => true,
                'message' => 'Contact marked as unread successfully'
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
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return response()->json([
                'success' => true,
                'message' => 'Contact deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong!'
            ], 500);
        }
    }
}
