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

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function new()
    {
        return view('users.new');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'bail|required|alpha|between:5,100',
            'surname' => 'bail|required|alpha|between:2,100',
            'id_card' => 'bail|required|numeric|digits_between:1,8|unique:users,id_card',
            'email' => 'required|email|unique:users,email',
            'password' => 'bail|required|alpha_dash|between:6,16',
            'phone_number' => 'bail|required|numeric|size:8',
            'address' => 'required|between:5,200',
        ]);

        User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'id_card' => $data['id_card'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
        ]);
        return redirect(route('users'));
    }
}
