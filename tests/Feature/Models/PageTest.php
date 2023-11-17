<?php

namespace Tests\Feature\Models;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageTest extends TestCase
{
    use RefreshDatabase;

    public function test_factory()
    {
        $model = Page::factory()->create();
        $this->assertNotNull($model->author->id);
    }
}
