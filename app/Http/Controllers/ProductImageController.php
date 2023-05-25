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
use App\Processors\Image\ImageVariantProcessor;

use App\Processors\Image\Breakpoints\Large;
use App\Processors\Image\Breakpoints\Small;
use App\Processors\Image\Breakpoints\Medium;
use App\Processors\Image\Breakpoints\XLarge;


use Intervention\Image\Image as ImageInstance;

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



    private ImageVariantProcessor $processor;


    public function __construct(ImageManager $manager, ProductService $productService, FileUploadService $fileUploadService,ImageVariantProcessor $processor)
    {
        $this->manager = $manager;
        $this->productService = $productService;
        $this->fileUploadService = $fileUploadService;
        $this->processor = $processor;
    }





    public function store(UploadImageRequest $request, Product $product)
    {


        $file = $request->file('file');
    //     return    $this->manager->make($file->getRealPath())
    //     ->orientate();



            // $asset = $this->productService->saveImage(
            //     $product, $this->fileUploadService->upload($request, function (UploadedFile $file) {
            //         if ($file->getClientMimeType() === 'image/svg+xml') {
            //             return $file;
            //         }
            //         return $file;
            //     })
            // );

            // return new AssetResource($asset);


            $variants=  [
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
            ];


           $uploaded_file=  $this->processor->generateVariants( $file, $variants);

           foreach($uploaded_file as $data){

            return $data->url;

           }


           dd ($uploaded_file);





    }


}
