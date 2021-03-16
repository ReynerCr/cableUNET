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
    /**
     * Shows the home page for clients.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index');
    }
}
