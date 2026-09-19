<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactPageQuery;
use Illuminate\Http\Request;

class ContactPageQueryController extends Controller
{
    public function index(request $request){
        $queries = ContactPageQuery::latest()->paginate(12);
        return view('admin.queries',compact('queries'));
    }
    public function store(request $request){
        $validated = $request->validate([
            'name'    => 'required|string|max:255|min:2',
            'email'   => 'required|email:dns|max:255',
            'phone'   => 'required|digits:10|regex:/^[6-9]\d{9}$/',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000|min:12',
        ]);
        ContactPageQuery::create($validated);
        return response()
            ->json([
                'success'=>true,
                'msg'=>'Thank you! Your query has been submitted successfully.'
            ],200);
    }
    public function show(ContactPageQuery $query)
    {
        // Automatically mark new query as read
        if ($query->status === 'new') {
            $query->update([
                'status' => 'read',
            ]);
        }

        return view('admin.queries.show', compact('query'));
    }

    public function updateStatus(Request $request, ContactPageQuery $query)
    {
        $request->validate([
            'status' => 'required|in:new,read,replied,closed',
        ]);

        $query->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Query status updated successfully.');
    }
}
