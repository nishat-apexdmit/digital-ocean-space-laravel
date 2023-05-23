<?php

namespace App\Http\Requests\product;

use App\Assets\AssetUploadRequestContract;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Filesystem\Filesystem;
use App\Assets\Requests\ImageUploadRequest;

class UploadImageRequest extends FormRequest  implements AssetUploadRequestContract
{
    use ImageUploadRequest;

    public function visibility(): string
    {
        return Filesystem::VISIBILITY_PUBLIC;
    }


}
