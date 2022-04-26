<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenEvents\LaravelClient\Event;
use OpenEvents\LaravelClient\Services\Pineprint\Pineprint;

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
        Event::dispatch('homepage.visit', $this->pineprint($request));

        return view('welcome');
    }

    protected function pineprint(Request $request)
    {
        $modifier = json_encode([
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        if ($request->user()) {
            $modifier .= $request->user()->id;
        }

        $integer = (new Pineprint($modifier))->getInteger();

        return json_encode([
            'request_pineprint' => substr(app('HumanoIDGenerator')->generator->create($integer % 1000), 0, 64)
        ]);
    }
}
