<?php

namespace App\Assets;

interface AssetUploadRequestContract
{
    /**
     * Get field name.
     *
     * @return string
     */
    public function field(): string;

    /**
     * Get directory name.
     *
     * @return string
     */
    public function directory(): string;

    /**
     * Get disk name.
     *
     * @return string
     */
    public function disk(): string;

    /**
     * Get file visibility.
     *
     * @return string
     */
    public function visibility(): string;

    /**
     * Retrieve a file from the request.
     *
     * @param  string|null  $key
     * @param  mixed  $default
     * @return \Illuminate\Http\UploadedFile|\Illuminate\Http\UploadedFile[]|array|null
     */
    public function file($key = null, $default = null);
}
