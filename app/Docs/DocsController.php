<?php

namespace App\Docs;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class DocsController extends Controller
{
    public function show(?string $page = null)
    {
        $page = $page ?? 'index';

        $file = resource_path('docs/'.$page.'.md');

        if (! file_exists($file)) {
            abort(404);
        }
    
        $markdown = Str::markdown(file_get_contents($file));

        return view('docs', ['docs' => $markdown]);
    }
}
