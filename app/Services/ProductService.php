<?php

namespace App\Services;

use App\Models\Asset;
use App\Assets\Type\Image;
use App\Assets\UploadedAsset;
use App\Assets\AssetableContract;
use App\Processors\Image\Breakpoints\Large;
use App\Processors\Image\Breakpoints\Small;
use App\Processors\Image\Breakpoints\Medium;
use App\Processors\Image\Breakpoints\XLarge;
use App\Repositories\Contracts\AssetRepositoryContract;

use Intervention\Image\Image as ImageInstance;

class ProductService
{
    /**
     * @var \App\Repositories\Contracts\AssetRepositoryContract
     */
    private AssetRepositoryContract $assetRepository;

    /**
     * ProductService constructor.
     *
     * @param  \App\Repositories\Contracts\AssetRepositoryContract  $assetRepository
     */
    public function __construct(AssetRepositoryContract $assetRepository)
    {

        $this->assetRepository = $assetRepository;
    }

    /**
     * Save product image.
     *
     * @param  \App\Assets\AssetableContract  $product
     * @param  \App\Assets\UploadedAsset  $file
     * @return \App\Asset
     */
    public function saveImage(AssetableContract $product, UploadedAsset $file): Asset
    {
        return $this->assetRepository->create($product, Image::class, $file, [
            new Small(function (ImageInstance $image) {
                return $image->fit(400, 300)->flip('v');
            }),
            new Medium(function (ImageInstance $image) {
                return $image->fit(600, 400)->colorize(-50, 0, 80);
            }),
            new Large(function (ImageInstance $image) {
                return $image->fit(800, 600)->flip('h');
            }),
            new XLarge(function (ImageInstance $image) {
                return $image->fit(1000, 800)->flip('v');
            })
        ]);
    }
}
