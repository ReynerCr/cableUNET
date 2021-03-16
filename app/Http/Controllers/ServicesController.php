<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use \App\Models\Services;
use App\Models\Services\Service;
use App\Models\Services\InternetService;
use App\Models\Services\TelephonyService;
use App\Models\Services\CableTvService;

class ServicesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        return view('admin.services.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($type)
    {
        if ($type < 1 || $type > 3) {
            return redirect(route('admin.users'));
        }
        $rules = [
            'name' => ['bail', 'required', 'alpha', 'between:2,30'],
            'price' => ['bail', 'required', 'numeric', 'min:1'],
        ];
        switch ($type) {
            case 1: // internet
                $rules['name'][] = Rule::unique('internet_services');
                $rules['download_speed'] = ['bail', 'required', 'numeric', 'min:0.1'];
                $rules['upload_speed'] = ['bail', 'required', 'numeric', 'min:0.1'];
                break;
            case 2: // telephony
                $rules['name'][] = Rule::unique('telephony_services');
                $rules['minutes'] = ['bail', 'required', 'numeric', 'integer', 'min:1'];
                break;
                $rules['name'][] = Rule::unique('cable_tv_services');
            case 3: // cable tv
                break;
        }

        $data = request()->validate($rules);
        switch ($type) {
            case 1:
                $service = InternetService::create([
                    'name' => $data['name'],
                    'download_speed' => $data['download_speed'],
                    'upload_speed' => $data['upload_speed'],
                    'price' => $data['price']
                ]);
                break;
            case 2:
                $service = TelephonyService::create([
                    'name' => $data['name'],
                    'minutes' => $data['minutes'],
                    'price' => $data['price']
                ]);
                break;
            case 3:
                $service = CableTvService::create([
                    'name' => $data['name'],
                    //TODO channels list
                    'price' => $data['price']
                ]);
                break;
        }
        return redirect()->route('admin.services.type.show', [$type, $service->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($type, $id)
    {
        switch ($type) {
            case 1:
                $service = InternetService::findOrFail($id);
                break;
            case 2:
                $service = TelephonyService::findOrFail($id);
                break;
            case 3:
                $service = CableTvService::findOrFail($id);
                break;
        }
        return view('admin.services.show', compact('type', 'service'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($type, $id)
    {
        // TODO get the type and search service and delete
        return redirect(route('admin.home'));
    }
}
