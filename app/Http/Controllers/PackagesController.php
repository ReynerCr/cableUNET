<?php

namespace App\Http\Controllers;

use App\Models\ServicePackage;
use Illuminate\Validation\Rule;
use \App\Models\Services\InternetService;
use \App\Models\Services\TelephonyService;
use \App\Models\Services\CableTvService;

class PackagesController extends Controller
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
        // checks if all the services are not empty
        // if so, redirects to admin.home
        $empty = 0;
        $internetlist = InternetService::all();
        if ($internetlist->isEmpty()) {
            ++$empty;
        }
        $telephonylist = TelephonyService::all();
        if ($telephonylist->isEmpty()) {
            ++$empty;
        }
        $cablelist = CableTvService::all();
        if ($cablelist->isEmpty()) {
            ++$empty;
        }
        if ($empty == 3) {
            return redirect(route('admin.home'))->withErrors(['No se puede crear un paquete de servicios sin haber registrado planes de servicios.']);
        }
        return view('admin.services.create_package', compact('internetlist', 'telephonylist', 'cablelist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $rules = [
            'name' => ['bail', 'required', 'between:2,30', Rule::unique('service_packages')],
            'price' => ['bail', 'required', 'numeric', 'min:1'],
            'internet_service_id' => ['bail', 'nullable', 'numeric', 'integer', 'exists:internet_services,id'],
            'telephony_service_id' => ['bail', 'nullable', 'numeric', 'integer', 'exists:telephony_services,id'],
            'cable_tv_service_id' => ['bail', 'nullable', 'numeric', 'integer', 'exists:cable_tv_services,id']
        ];
        $data = request()->validate($rules);
        if (
            !isset($data['internet_service_id']) &&
            !isset($data['telephony_service_id']) &&
            !isset($data['cable_tv_service_id'])) {
                return redirect(route('admin.packages.create'))->withErrors(['No se puede crear un paquete sin planes de servicios.']);
        }
        $package = ServicePackage::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'internet_service_id' => $data['internet_service_id'],
            'telephony_service_id' => $data['telephony_service_id'],
            'cable_tv_service_id' => $data['cable_tv_service_id']
        ]);
        return redirect()->route('admin.packages.show', $package);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ServicePackage $package)
    {
        return view('packages.show_package', compact('package'));
    }
}
