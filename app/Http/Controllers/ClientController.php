<?php

namespace App\Http\Controllers;

use App\Models\ServicePackage;
use App\Models\Suscription;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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

    /**
     * Create a purchase package
     */
    public function create()
    {
        $packages = ServicePackage::all();
        if ($packages->isEmpty()) // this shouldn't happen but is worth to check it
        {
            return redirect(route('client.home'));
        }
        return view('client.purchase_package', compact('packages'));
    }

    public function createId()
    {
        $data = request()->validate([
            'service_package_id' => [
                'bail', 'numeric', 'integer', 'exists:service_packages,id'
            ]
        ]);
        $package = ServicePackage::find($data['service_package_id']);
        $packages = ServicePackage::all();
        if ($packages->isEmpty()) // this shouldn't happen but is worth to check it
        {
            return redirect(route('client.home'));
        }
        return view('client.purchase_package', ['packages' => $packages, 'package' => $package]);
    }

    public function storePackage()
    {
        $data = request()->validate([
            'service_package_id' => ['bail', 'numeric', 'integer', 'exists:service_packages,id']
        ]);
        $subscription = new Suscription;
        $userid = Auth::user()->id;
        $subscription->user_id = $userid;
        $subscription->service_package_id = $data['service_package_id'];
        $subscription->save();
        return redirect()->route('client.id.sub',  compact('userid', 'subscription'));
    }

    public function showSubscription(User $user, Suscription $suscription)
    {
        $package = $suscription->package;
        if (!isset($package)) // if subscription doesn't exist
            return redirect()->route('client.home');
        return view('client.show_subscription', compact('suscription', 'package', 'user'));
    }
}
