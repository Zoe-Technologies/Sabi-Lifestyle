<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAdmin()
    {
        $user = auth()->user();
        $inboxes = Inbox::all();
        return view('admin.inboxes.index', compact('user', 'inboxes'));
    }
    public function indexUser()
    {
        $user = auth()->user();
        $inboxes = Inbox::all()->where('user_id', $user->id);
        return view('users.inboxes.index', compact('user', 'inboxes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('users.inboxes.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inbox = $request->validate(([
            'user_id' => 'required',
            'message' => 'required',
        ]));



        $inbox = Inbox::create([
            'user_id' => $request->input('user_id'),
            'message' => $request->input('message'),
        ]);

        return redirect()->intended(route('dashboard.user.inbox.index', absolute: false));
    }

    /**
     * Display the specified resource.
     */
    public function showAdmin(Inbox $inbox, $id)
    {
        $user = auth()->user();
        $inbox = Inbox::findOrFail($id);
        return view('admin.inboxes.show', compact('user', 'inbox'));
    }

    public function showUser(Inbox $inbox, $id)
    {
        $user = auth()->user();
        $inbox = Inbox::findOrFail($id);
        return view('users.inboxes.show', compact('user', 'inbox'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inbox $inbox, $id)
    {
        $user = auth()->user();
        $inbox = Inbox::findOrFail($id);
        return view('users.inboxes.edit', compact('user', 'inbox'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $inbox = Inbox::findOrFail($id);
        $valid = $request->validate([
            'user_id' => 'required',
            'message' => 'required',
        ]);



        $update = [
            'user_id' => $request->input('user_id'),
            'message' => $request->input('message'),
        ];

        $inbox->update($update);

        return redirect()->intended(route('dashboard.user.inbox.index', absolute: false));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inbox $inbox, $id)
    {
        $inbox = Inbox::findOrFail($id);
        $inbox->delete();
        return redirect()->back()->with('message', 'Message deleted Successfully');
    }
}
