<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\ProductService;

use Illuminate\Http\JsonResponse;


use Illuminate\Http\UploadedFile;
use App\Services\FileUploadService;
use App\Http\Resources\AssetResource;
use App\Http\Requests\Product\UploadImageRequest;
use Intervention\Image\ImageManager;
use App\Models\Product;
use App\Assets\AssetableContract;


class ProductImageController extends Controller
{


    /**
     * @var \Intervention\Image\ImageManager
     */
    private ImageManager $manager;

    /**
     * @var \App\Services\ProductService
     */
    private ProductService $productService;

    /**
     * @var \App\Services\FileUploadService
     */
    private FileUploadService $fileUploadService;


    public function __construct(ImageManager $manager, ProductService $productService, FileUploadService $fileUploadService)
    {
        $this->manager = $manager;
        $this->productService = $productService;
        $this->fileUploadService = $fileUploadService;
    }




    public function store(UploadImageRequest $request, Product $product)
    {


    //    $file = $request->file('file');
    //     return    $this->manager->make($file->getRealPath())
    //     ->orientate();



            $asset = $this->productService->saveImage(
                $product, $this->fileUploadService->upload($request, function (UploadedFile $file) {
                    if ($file->getClientMimeType() === 'image/svg+xml') {
                        return $file;
                    }
                    return $file;
                })
            );

            return new AssetResource($asset);
    }


}
