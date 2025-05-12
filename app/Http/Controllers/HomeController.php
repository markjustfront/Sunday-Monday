<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\View\Factory;

class HomeController extends Controller
{
    public function index(Request $request): Factory|View|Application
    {
        return view('homepage', [
            'message' => 'This is my classified publications home page, feel free to wonder arround',
        ]);
    }
}
