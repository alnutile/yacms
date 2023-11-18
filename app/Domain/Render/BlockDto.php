<?php

namespace App\Domain\Render;

class BlockDto extends \Spatie\LaravelData\Data
{
    public function __construct(
        public string $type,
        public array $data,
    ) {
    }
}
