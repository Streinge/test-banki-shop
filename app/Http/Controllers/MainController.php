<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getHomePage()
    {
        return view(view: 'home');
    }

    public function checkFileNames(Request $request)
    {
        $valid = $request->validate(['files' => 'required|array|between:1,5']);
        dd($valid);
    }
}
