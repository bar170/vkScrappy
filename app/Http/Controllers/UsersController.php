<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() {
        return response('Список пользователей')->header('Content0Type', 'text/plain');
    }
}
