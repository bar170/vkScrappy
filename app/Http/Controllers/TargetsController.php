<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Target;

class TargetsController extends Controller
{
    public function index() {
        $targets = Target::latest()->get();
        $context = ['targets' => $targets];

        return view('index', $context);
    }

    public function detail(Target $target) {

        $context = [
            'gender' => $target->gender,
            'name' => $target->name,
            'vk_id' => $target->vk_id,
            'birthday' => $target->birthday,
            'link' => $target->link,
            'last_online' => $target->last_online,
            'probability_bot' => $target->probability_bot,
            'status_page_id' => $target->status_page_id,
            'location_id' => $target->location_id
        ];

        return view('detail', $context);
    }
}
