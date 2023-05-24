<?php

namespace App\Processors\Image\Breakpoints;

use Closure;

abstract class Breakpoint
{
    /**
     * @var int|null
     */
    public ?int $width = null;

    /**
     * @var int|null
     */
    public ?int $height = null;

    /**
     * @var \Closure|null
     */
    public ?Closure $process = null;

    /**
     * Breakpoint constructor.
     *
     * @param  \Closure|int|null  $width
     * @param  int|null  $height
     */
    public function __construct($width = null, int $height = null)
    {
        if ($width instanceof Closure) {
            $this->process = $width;
        } else {
            $this->width = $width;
            $this->height = $height;
        }
    }

    /**
     * Get index name.
     *
     * @return string
     */
    abstract public function index(): string;
}
