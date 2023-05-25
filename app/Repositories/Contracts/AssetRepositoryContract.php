<?php

namespace App\Repositories\Contracts;

use App\Models\Asset;
use App\Assets\UploadedAsset;
use App\Assets\AssetableContract;

use Closure;

interface AssetRepositoryContract
{

    public function create(
        AssetableContract $model,
        string $type,
        UploadedAsset $file,
        array $variants = [],
        Closure $process = null
    ): Asset;


    public function nextSortFor(AssetableContract $model, string $type): int;


    public function remove($assets): void;
}
