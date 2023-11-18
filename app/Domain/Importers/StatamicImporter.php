<?php

namespace App\Domain\Importers;

use App\Models\Page;
use App\Models\User;
use IteratorIterator;

class StatamicImporter
{
    /**
     * @NOTE
     * using https://statamic.com/addons/steadfastcollective/csv-exporter
     * I dumped the data into CSV
     * Keeping things simple it assumes all images are in the
     * linked folder that Pages puts them in
     * /public/storage/
     */
    public function handle(IteratorIterator|array $dataFromCsv): void
    {
        $user = User::first();
        foreach ($dataFromCsv as $item) {
            $tags = $this->getTags($item);

            $blocks = $this->makeBlocks($item);

            $date = data_get($item, 'Data', now());
            $slug = data_get($item, 'Slug', null);

            if (blank($slug)) {
                $slug = str(data_get($item, 'Title'))->slug();
            }

            $title = data_get($item, 'Title');

            if (! empty($title)) {
                $page = Page::firstOrCreate([
                    'external_id' => $item['ID'],
                ], [
                    'title' => $title,
                    'author_id' => $user?->id,
                    'created_at' => $date,
                    'slug' => $slug,
                    'published' => true,
                    'updated_at' => $date,
                    'blocks' => $blocks,
                ]);

                $page->syncTags($tags);
            }

        }
    }

    protected function getTags($item): array
    {
        $tags = data_get($item, 'Tags', []);

        if (! empty($tags)) {
            $tags = json_decode($tags);
        } else {
            $tags = [];
        }

        if ($tags === null) {
            logger('Bug with these tags', $item);
            $tags = [];
        }

        return $tags;
    }

    protected function makeBlocks($item): array
    {
        $blocks = [];

        $title = data_get($item, 'Title');

        $content = str(data_get($item, 'Content'))->limit(256)->toString();

        $blocks[] = [
            'type' => 'intro',
            'data' => [
                'blocks' => $content,
                'url' => data_get($item, 'Hero Image', 'default-hero.jpg'),
            ],
        ];

        $blocks[] = [
            'type' => 'image',
            'data' => [
                'url' => data_get($item, 'Here Image', 'default-hero.jpg'),
                'alt' => $title,
                'center' => true,
            ],
        ];

        $blocks[] = [
            'type' => 'mark_down_paragraph',
            'data' => [
                'blocks' => $content,
            ],
        ];

        return $blocks;
    }
}
