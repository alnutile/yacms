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

        $this->assertStringContainsString('<h2>Test</h2>', $results);
        $this->assertStringContainsString('01HFFTZV9PZFRXQPNCKFP5C39S', $results);

    }
}
