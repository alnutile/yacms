<?php

namespace App\Http\Controllers;

use App\Http\Resources\PagesResource;
use App\Models\Page;

class PagesController extends Controller
{
    public function __invoke()
    {
        $pages = Page::query()
            ->wherePublished(true)
            ->latest()
            ->paginate(10);

        return inertia('Page/Index', [
            'pages' => PagesResource::collection($pages),
            'title' => 'Posts',
        ]);
    }
}
