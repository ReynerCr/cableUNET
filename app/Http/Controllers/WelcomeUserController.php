<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUserController extends Controller
{
    public function greetingWithNickname($name, $nickname)
    {
        $name = ucfirst($name);
        $nickname = ucfirst($nickname);

        return view('welcome.greetings_with_nickname', compact('name', 'nickname'));
    }

    public function greetingWithoutNickname($name)
    {
        $name = ucfirst($name);
        return view('welcome.greetings_without_nickname', compact('name'));
    }
}
