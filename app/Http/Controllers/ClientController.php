<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use \App\Models\User;

class ClientController extends UserController
{
    public function __construct()
    {
        parent::__construct(); //auth
        $this->middleware('isuser');
        $this->middleware('usercansee', ['only' => ['show', 'edit', 'update']]);
    }
    public function home()
    {
        return view('client.index');
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
}
