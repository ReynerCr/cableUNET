<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use \App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isuser');
        // TODO middleware not working probably because routes are incorrect
        $this->middleware('usercansee', ['only' => ['show', 'edit', 'update']]);
    }
    public function home()
    {
        return view('user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->home();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $data = request()->validate([
            'name' => ['bail','required','alpha','between:2,100'],
            'surname' => ['bail','required','alpha','between:2,100'],
            'id_card' => ['bail','required','numeric','digits_between:1,8',Rule::unique('users')->ignore($user->id)],
            'email' => ['bail','required','email',Rule::unique('users')->ignore($user->id)],
            'password' => ['bail','nullable','alpha_dash','between:6,16'],
            'phone_number' => ['bail','required','digits:11'],
            'address' => ['bail','required','between:5,200'],
        ]);

        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        return redirect(route('admin.users.id.show', $user));
    }
}
