<?php

namespace App\Assets;

use Illuminate\Http\UploadedFile;

class UploadedAsset
{
    /**
     * @var \Illuminate\Http\UploadedFile
     */
    public UploadedFile $file;

    /**
     * @var string
     */
    public string $path;

    /**
     * @var string
     */
    public string $disk;

    /**
     * @var int
     */
    public int $size;

    /**
     * @var string
     */
    public string $visibility;

    /**
     * @var string
     */
    public string $extension;

    /**
     * @var string|null
     */
    public ?string $mime;

    /**
     * @var string|null
     */
    public ?string $originalName;

    /**
     * @var string
     */
    public string $fileName;

    /**
     * @var string
     */
    public string $directory;

    /**
     * @var bool
     */
    public bool $isImage;

    /**
     * UploadedAsset constructor.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  string  $path
     * @param  string  $disk
     * @param  string  $visibility
     */
    public function __construct(UploadedFile $file, string $path, string $disk, string $visibility)
    {
        $this->file = $file;
        $this->path = $path;
        $this->disk = $disk;
        $this->size = $file->getSize();
        $this->visibility = $visibility;
        $this->extension = $file->extension();
        $this->mime = $file->getClientMimeType();
        $this->originalName = $file->getClientOriginalName();

        $info = pathinfo($this->path);

        $this->fileName = $info['basename'];
        $this->directory = $info['dirname'];

        $this->isImage = substr($this->mime ?? '', 0, 6) === 'image/';
    }
}
