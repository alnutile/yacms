<?php

namespace Tests\Feature;

use App\Domain\Render\RenderContent;
use App\Models\Page;
use Tests\TestCase;

class RenderContentTest extends TestCase
{
    public function test_renders_paragraph()
    {
        $page = Page::factory()->create();

        $results = app(RenderContent::class)->handle($page);

        $this->assertStringContainsString('Test</h2>', $results);
        $this->assertStringContainsString('01HFFYQWXAES2XJD7M9F2727WG', $results);
        $this->assertStringContainsString('Sed ut perspiciatis unde', $results);
    }

    public function test_renders_intro()
    {
        $page = Page::factory()->create();

        $results = app(RenderContent::class)->getIntro($page);

        $this->assertNotNull($results->intro);
        $this->assertNotNull($results->image);
    }
}
