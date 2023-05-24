<?php

namespace App\Assets;

use App\Models\Asset;

use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasAssets
{
    /**
     * @inheritDoc
     */
    public function assets(): MorphMany
    {
        return $this->morphMany(Asset::class, 'assetable');
    }
}
