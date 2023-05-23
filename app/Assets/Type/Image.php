<?php

namespace App\Assets\Type;

class Image implements AssetTypeContract
{
    /**
     * @inheritDoc
     */
    public static function directory(): string
    {
        return 'images';
    }
}
