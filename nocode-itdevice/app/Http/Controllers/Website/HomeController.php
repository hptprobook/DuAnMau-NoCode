<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Website;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {

        $website_info = Website::all()[0];

        return view('home', compact('website_info'));
    }
}
