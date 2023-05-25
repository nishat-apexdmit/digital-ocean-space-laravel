<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AssetCollection extends ResourceCollection
{



    public $collects = AssetResource::class;



    public function toArray($request)
    {
        return $this->collection->toArray();
    }
}
