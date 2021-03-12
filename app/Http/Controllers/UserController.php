<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $title = 'Listado de usuarios';

        return view('users.index', compact('users', 'title'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function new()
    {
        return view('users.new');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
}
