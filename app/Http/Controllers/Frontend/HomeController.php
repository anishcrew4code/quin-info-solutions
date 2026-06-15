<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Technology;
use App\Models\Portfolio;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'services' => Service::where('status',1)->get(),
            'technologies' => Technology::where('status',1)->get(),
            'portfolios' => Portfolio::where('status',1)->latest()->take(6)->get()
        ]);
    }
}