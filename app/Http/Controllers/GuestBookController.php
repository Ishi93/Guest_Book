<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestBookEntry;

class GuestBookController extends Controller
{
    public function index()
    {
        $entries = GuestBookEntry::orderBy('created_at', 'DESC')->get();
        return view('guestbook', ['entries' => $entries]);
    }

    public function create()
    {
        return view('guestbook_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'message' => 'required',
        ]);

        $entry = new GuestBookEntry();
        $entry->name = $request->input('name');
        $entry->email = $request->input('email');
        $entry->message = $request->input('message');
        $entry->save();

        return redirect()->route('guestbook.index');
    }

    public function reset()
    {
        GuestBookEntry::truncate();
        return redirect()->back()->with('status', 'Guest book reset successful!');
    }
}