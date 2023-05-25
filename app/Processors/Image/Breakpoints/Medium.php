<?php

namespace App\Processors\Image\Breakpoints;

class Medium extends Breakpoint
{
    /**
     * @inheritDoc
     */
    public function index(): string
    {
        return 'md';
    }
}
