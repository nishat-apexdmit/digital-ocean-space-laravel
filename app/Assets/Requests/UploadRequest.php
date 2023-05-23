<?php

namespace App\Assets\Requests;

trait UploadRequest
{

    public function field(): string
    {
        return 'file';
    }


    public function disk(): string
    {
        return config('filesystems.default');
    }


}
