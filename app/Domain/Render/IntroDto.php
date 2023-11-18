<?php

namespace App\Domain\Render;

use Spatie\LaravelData\Data;

class IntroDto extends Data
{
    public function __construct(
        public string $intro = '',
        public string $image = '',
    ) {
    }
}
