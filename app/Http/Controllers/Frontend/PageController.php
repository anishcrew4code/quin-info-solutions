<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Technology;
use App\Models\Portfolio;

class PageController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function services()
    {
        $services = Service::where('status', 1)->get();
        return view('services', compact('services'));
    }

    public function technologies()
    {
        $technologies = Technology::where('status', 1)->get();
        return view('technologies', compact('technologies'));
    }

    public function portfolio()
    {
        $portfolios = Portfolio::where('status', 1)->latest()->get();
        return view('portfolio', compact('portfolios'));
    }
}
