<?php

namespace App\Domain\Render;

use App\Models\Page;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class RenderContent
{
    protected Collection $content;

    protected array $exclude = ['intro'];

    public function getIntro(Page $page): IntroDto
    {
        return Cache::rememberForever('page_intro_'.$page->id, function () use ($page) {
            $intro = IntroDto::from();
            foreach ($page->blocks as $block) {
                $block = BlockDto::from($block);
                if (method_exists($this, $block->type) && $block->type === 'intro') {
                    $intro = $this->intro($block);
                }
            }

            return $intro;
        });
    }

    public function handle(Page $page): string
    {

        $this->content = collect([]);

        return Cache::rememberForever('page_'.$page->id, function () use ($page) {

            foreach ($page->blocks as $block) {
                $block = BlockDto::from($block);
                if (method_exists($this, $block->type) && ! in_array($block->type, $this->exclude)) {
                    $this->content->add($this->{$block->type}($block));
                }
            }

            return $this->content->implode("\n");
        });

    }

    protected function intro(BlockDto $blockDto): IntroDto
    {

        $content = str($blockDto->data['blocks'])->markdown();
        $image = $blockDto->data['url'];

        return IntroDto::from([
            'intro' => $content,
            'image' => '/'.$image,
        ]);
    }

    protected function blockquote(BlockDto $blockDto): string
    {
        $content = str($blockDto->data['blocks'])->markdown();

        return sprintf('<blockquote class="text-xl italic font-semibold text-gray-900 dark:text-white"><p>%s</p></blockquote>', $content);
    }

    protected function mark_down_paragraph(BlockDto $blockDto): string
    {
        $content = str($blockDto->data['blocks'])->markdown();

        return sprintf('<div>%s</div>', $content);
    }

    protected function paragraph(BlockDto $blockDto): string
    {
        $content = $blockDto->data['blocks'];

        return sprintf('<div>%s</div>', $content);
    }

    protected function image(BlockDto $blockDto): string
    {
        $image = $blockDto->data['url'];
        $imageAlt = $blockDto->data['alt'];
        $center = $blockDto->data['center'];

        $css = [];
        if ($center) {
            $css[] = 'mx-auto justify-center';
        }
        $css = implode(' ', $css);

        return sprintf("<img class='p-4 %s' src='/storage/%s' alt='%s' />", $css, $image, $imageAlt);
    }

    protected function heading(BlockDto $blockDto): string
    {
        $headers = [
            'h1' => '<h1 class="text-5xl font-extrabold dark:text-white">%s</h1>',
            'h2' => '<h2 class="text-4xl font-bold dark:text-white">%s</h2>',
            'h3' => '<h3 class="text-3xl font-bold dark:text-white">%s</h3>',
            'h4' => '<h4 class="text-2xl font-bold dark:text-white">%s</h4>',
        ];

        $key = data_get($blockDto->data, 'level', 'h1');

        return sprintf(data_get($headers, $key, $headers['h1']), $blockDto->data['blocks']);
    }
}
