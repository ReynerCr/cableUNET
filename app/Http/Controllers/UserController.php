<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
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

    public function store()
    {
        $data = request()->validate([
            'name' => [
                'bail',
                'required',
                'alpha',
                'between:2,100'
            ],
            'surname' => [
                'bail',
                'required',
                'alpha',
                'between:2,100',
            ],
            'id_card' => [
                'bail',
                'required',
                'numeric',
                'digits_between:1,8',
                Rule::unique('users'),
            ],
            'email' => [
                'bail',
                'required',
                'email',
                Rule::unique('users'),
            ],
            'password' => [
                'bail',
                'required',
                'alpha_dash',
                'between:6,16',
            ],
            'phone_number' => [
                'bail',
                'required',
                'digits:11',
            ],
            'address' => [
                'bail',
                'required',
                'between:5,200',
            ]
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

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => [
                'bail',
                'required',
                'alpha',
                'between:2,100'
            ],
            'surname' => [
                'bail',
                'required',
                'alpha',
                'between:2,100',
            ],
            'id_card' => [
                'bail',
                'required',
                'numeric',
                'digits_between:1,8',
                Rule::unique('users')->ignore($user->id),
            ],
            'email' => [
                'bail',
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => [
                'bail',
                'nullable',
                'alpha_dash',
                'between:6,16',
            ],
            'phone_number' => [
                'bail',
                'required',
                'digits:11',
            ],
            'address' => [
                'bail',
                'required',
                'between:5,200',
            ],
        ]);

        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        return redirect()->route('users.show', $user->id);
    }
}
