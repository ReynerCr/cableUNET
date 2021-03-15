<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use \App\Models\User;

class AdminController extends UserController
{
    public function __construct()
    {
        parent::__construct(); // auth
        $this->middleware('isadmin');
    }
    public function home()
    {
        return view('admin.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAllUsers()
    {
        $users = User::all();
        return view('users.list', compact('users'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('admin.users'));
    }
    public function new()
    {
        return view('users.new');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'name' => ['bail', 'required', 'alpha', 'between:2,100'],
            'surname' => ['bail', 'required', 'alpha', 'between:2,100'],
            'id_card' => ['bail', 'required', 'numeric', 'digits_between:1,8', Rule::unique('users')],
            'email' => ['bail', 'required', 'email', Rule::unique('users')],
            'password' => ['bail', 'required', 'alpha_dash', 'between:6,16'],
            'phone_number' => ['bail', 'required', 'digits:11'],
            'address' => ['bail', 'required', 'between:5,200']
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
        return redirect(route('admin.users'));
    }
}
