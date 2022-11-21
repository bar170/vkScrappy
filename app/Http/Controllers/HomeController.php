<?php

namespace App\Http\Controllers;

use App\Models\Target;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.dashboard');
    }

    public function showAddTargetForm() {
        return view ('dashboard.target_add');
    }

    public function storeTarget(Request $request) {
        Auth::user()->targets()->create([
            'gender' => 'Male',
            'status_page_id' => 1,
            'name' => $request->name,
            'vk_id' => (int) ($request->vk_id),
            'link' => 'durov',
            'location_id' => 1,
            'user_id' => 1,
        ]);

        return redirect()->route('home');
    }
}
