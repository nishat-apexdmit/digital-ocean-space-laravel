<?php

namespace App\Processors\Image\Breakpoints;

class Large extends Breakpoint
{
    /**
     * @inheritDoc
     */
    public function index(): string
    {
        return 'lg';
    }
}
