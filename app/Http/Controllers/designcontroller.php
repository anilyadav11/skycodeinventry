<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class designcontroller extends Controller
{
    public function overview()
    {
        $user = Auth::user();
        return view('designation.overview', ['user' => $user]);
    }
}
