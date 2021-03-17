<?php

namespace App\Http\Controllers;

use App\Models\ServicePackage;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ClientController extends UserController
{
    public function __construct()
    {
        parent::__construct(); //auth
        $this->middleware('isuser');
        $this->middleware('usercansee:user', ['only' => ['show', 'edit', 'update']]);
        $this->middleware('usercansee:subscription', ['only' => ['showSubscription',]]);
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
        $subscription = new Subscription;
        $user = Auth::user()->id;
        $subscription->user_id = $user;
        $subscription->service_package_id = $data['service_package_id'];
        $subscription->save();
        return redirect()->route('client.id.sub',  compact('user', 'subscription'));
    }

    public function showSubscription(User $user, Subscription $subscription)
    {
        $package = $subscription->package;
        if (!isset($package)) // if subscription doesn't exist
            return redirect()->route('client.home');
        return view('client.show_subscription', compact('subscription', 'package', 'user'));
    }
}
