<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function __invoke(string $slug)
    {
        $page = Page::whereSlug($slug)->first();

        if(!$page) {
            abort(404);
        }

        return inertia("Page/Show");
    }
}
