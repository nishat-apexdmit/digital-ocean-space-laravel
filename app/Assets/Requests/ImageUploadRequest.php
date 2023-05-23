<?php

namespace App\Assets\Requests;

use App\Assets\Type\Image;

trait ImageUploadRequest
{
    use UploadRequest;

    public function rules(): array
    {
        return [
            $this->field() => [
                'required',
                'image',
                'max:'.config('filesystems.max_size'),
            ],
        ];
    }


    public function directory(): string
    {
        return Image::directory();
    }
}
