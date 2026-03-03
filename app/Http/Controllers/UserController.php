<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show the form
    public function create()
    {
        $users = User::all(); //Fetch Everyone from the database
        return view('users.create', compact('users'));
    }

    // Save the user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Always hash passwords!
        ]);

        return redirect()->back()->with('success', 'User saved successfully!');
    }

    public function index()
    {
        //fetch all users sorted by newest first
        $users = User::latest()->get();
        return view('users.index', compact('users'));
    }
}

