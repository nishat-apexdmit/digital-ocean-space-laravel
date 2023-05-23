<?php

namespace App\Assets\Type;

interface AssetTypeContract
{
    /**
     * Get storage directory.
     *
     * @return string
     */
    public static function directory(): string;
}
