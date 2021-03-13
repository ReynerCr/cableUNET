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
            'name' => 'required',
            'surname' => 'required',
            'id_card' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'surname.required' => 'El campo apellido es obligatorio',
            'id_card.required' => 'El campo cédula es obligatorio',
            'email.required' => 'El campo es email obligatorio',
            'password.required' => 'El campo contraseña es obligatorio',
            'phone_number.required' => 'El campo teléfono es obligatorio',
            'address.required' => 'El campo dirección es obligatorio',
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
