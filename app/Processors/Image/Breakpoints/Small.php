<?php

namespace App\Processors\Image\Breakpoints;

class Small extends Breakpoint
{
    /**
     * @inheritDoc
     */
    public function index(): string
    {
        return 'sm';
    }
}
