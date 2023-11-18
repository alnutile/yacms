<?php

namespace Tests\Feature;

use App\Models\Page;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class PagesControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_renders(): void
    {
        Page::factory()
            ->count(10)
            ->create();

        $response = $this->get(route('pages.index'))
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page
                ->has('pages.data'));

        $response->assertStatus(200);
    }
}
