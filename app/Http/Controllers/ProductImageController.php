<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\Product\UploadImageRequest;

use Illuminate\Http\JsonResponse;

class ProductImageController extends Controller
{
    public function store(UploadImageRequest $request)
    {
        return '';
    }
}
