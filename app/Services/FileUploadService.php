<?php

namespace App\Services;

use App\Assets\UploadedAsset;
use App\Assets\AssetUploadRequestContract;

use Closure;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileUploadService
{

    public function upload(AssetUploadRequestContract $request, Closure $processor = null): UploadedAsset
    {
        $file = $this->parseFile($request->file($request->field()), $processor);

        $path = Storage::putFile(
            $request->directory(),
            $file,
            [
                'disk' => $disk = $request->disk(),
                'visibility' => $visibility = $request->visibility(),
            ]
        );

        return new UploadedAsset($file, $path, $disk, $visibility);
    }




    private function parseFile(UploadedFile $file, ?Closure $processor): UploadedFile
    {
        if (is_null($processor)) {
            return $file;
        }

        return new UploadedFile(
            (call_user_func($processor, $file)),
            $file->getClientOriginalName(),
            $file->getClientMimeType()
        );
    }
}
