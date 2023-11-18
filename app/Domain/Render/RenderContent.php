<?php

namespace App\Domain\Render;

use App\Models\Page;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class RenderContent
{
    protected Collection $content;

    public function handle(Page $page): string
    {

        $this->content = collect([]);

        return Cache::rememberForever('page_'.$page->id, function () use ($page) {

            foreach ($page->blocks as $block) {
                $block = BlockDto::from($block);
                if (method_exists($this, $block->type)) {
                    $this->content->add($this->{$block->type}($block));
                }
            }

            return $this->content->implode("\n");
        });

    }

    protected function image(BlockDto $blockDto): string
    {
        $image = $blockDto->data['url'];
        $imageAlt = $blockDto->data['alt'];

        return sprintf("<img src='/storage/%s' alt='%s'", $image, $imageAlt);
    }

    protected function heading(BlockDto $blockDto): string
    {
        $header = str($blockDto->data['level'])->wrap('<', '>');
        $headerEnd = str($blockDto->data['level'])->wrap('</', '>');

        return sprintf('%s%s%s', $header, $blockDto->data['blocks'], $headerEnd);
    }
}
