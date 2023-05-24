<?php

namespace App\Models;

use App\Traits\Sortable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Asset extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'assetable_id',
        'assetable_type',
        'type',
        'disk',
        'visibility',
        'sort',
        'path',
        'original_name',
        'extension',
        'mime',
        'size',
        'caption',
        'variants',
    ];

    protected $casts = [
        'variants' => 'array',
    ];


    protected $appends = [
        'url',
    ];

    public function assetable(): MorphTo
    {
        return $this->morphTo();
    }


    public function getUrlAttribute(): string
    {
        return Storage::disk($this->disk)->url($this->path);
    }

}
