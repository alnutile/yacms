<?php

namespace Tests\Feature;

use App\Models\Page;
use App\Models\User;
use Facades\App\Domain\Importers\StatamicImporter;
use Tests\TestCase;

class StatamicImporterTest extends TestCase
{
    public function test_importer()
    {
        $user = User::factory()->create();
        $record = get_fixture('importable.json');
        $this->assertDatabaseCount('pages', 0);
        StatamicImporter::handle([$record]);
        $this->assertDatabaseCount('pages', 1);
        $page = Page::first();
        $this->assertCount(2, $page->tags);
        $this->assertNotEmpty($page->blocks);
    }
}
