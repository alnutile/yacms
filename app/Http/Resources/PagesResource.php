<?php

namespace App\Http\Resources;

use App\Domain\Render\IntroDto;
use Facades\App\Domain\Render\RenderContent;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var IntroDto $pageIntro */
        $pageIntro = RenderContent::getIntro($this->resource);
        return [
            'id' => $this->id,
            'url' => route("frontend", [
                'slug' => $this->slug
            ]),
            'title' => $this->title,
            'intro' => $pageIntro->intro,
            'image' => $pageIntro->image,
        ];
    }
}
