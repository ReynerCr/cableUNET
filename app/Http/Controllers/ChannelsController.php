<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use \App\Models\Services\Tv\TvChannel;

class ChannelsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isadmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create_channels');
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
            'name' => ['bail', 'required', 'between:1,30', Rule::unique('tv_channels')],
            'description' => ['bail', 'required', 'between:4,150']
        ]);

        TvChannel::create([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
        return redirect(route('admin.home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
}
