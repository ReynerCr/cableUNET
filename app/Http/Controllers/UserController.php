<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use \App\Models\User;

class UserController extends Controller
{
<<<<<<< HEAD
=======
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isuser');
    }
    public function home()
    {
        return view('user');
    }
>>>>>>> laravelui
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $title = 'Listado de usuarios';

        return view('users.index', compact('users', 'title'));
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
<<<<<<< HEAD
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
=======
            'name' => ['bail','required','alpha','between:2,100'],
            'surname' => ['bail','required','alpha','between:2,100'],
            'id_card' => ['bail','required','numeric','digits_between:1,8',Rule::unique('users')],
            'email' => ['bail','required','email',Rule::unique('users')],
            'password' => ['bail','required','alpha_dash','between:6,16'],
            'phone_number' => ['bail','required','digits:11'],
            'address' => ['bail','required','between:5,200']
>>>>>>> laravelui
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
        return redirect(route('users.index'));
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
<<<<<<< HEAD
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
=======
            'name' => ['bail','required','alpha','between:2,100'],
            'surname' => ['bail','required','alpha','between:2,100'],
            'id_card' => ['bail','required','numeric','digits_between:1,8',Rule::unique('users')->ignore($user->id)],
            'email' => ['bail','required','email',Rule::unique('users')->ignore($user->id)],
            'password' => ['bail','nullable','alpha_dash','between:6,16'],
            'phone_number' => ['bail','required','digits:11'],
            'address' => ['bail','required','between:5,200'],
>>>>>>> laravelui
        ]);

        if ($data['password'] != null) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        return redirect(route('users.show', $user));
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
        return redirect(route('users.index'));
    }
}
