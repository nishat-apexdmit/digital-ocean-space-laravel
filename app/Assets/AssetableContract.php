<?php

namespace App\Assets;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface AssetableContract
{

    public function assets(): MorphMany;
}
