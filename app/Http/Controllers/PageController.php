<?php

namespace App\Http\Controllers;

use Facades\App\Domain\Render\RenderContent;
use App\Models\Page;

class PageController extends Controller
{
    public function __invoke(string $slug)
    {
        $page = Page::whereSlug($slug)->wherePublished(true)->first();

        if (! $page) {
            abort(404);
        }

        return inertia('Page/Show', [
            'page' => RenderContent::handle($page),
            'title' => $page->title,
        ]);
    }
}
