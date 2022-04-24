<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenEvents\LaravelClient\Event;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        Event::dispatch('homepage.visit');

        return view('welcome');
    }
}
