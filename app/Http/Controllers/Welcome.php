<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Welcome extends Controller
{
    public function index() {
        $context = [];
        return view('welcome', $context);
    }
}
