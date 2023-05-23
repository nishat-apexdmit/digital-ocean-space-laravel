<?php

namespace App\Assets\Type;

class Document implements AssetTypeContract
{
    /**
     * @inheritDoc
     */
    public static function directory(): string
    {
        return 'documents';
    }
}
