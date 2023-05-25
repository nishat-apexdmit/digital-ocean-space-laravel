<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class AssetResource
 *
 * @package App\Http\Resources
 *
 * @property int $id
 * @property string $original_name
 * @property string $extension
 * @property string $url
 * @property array $variants
 */
class AssetResource extends JsonResource
{



    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->original_name,
            'extension' => $this->extension,
            'url' => $this->url,
            'variants' => $this->variants,
            'preload' => $this->preload(),
        ];
    }





    private function preload(): array
    {
        if (empty($this->variants)) {
            return [];
        }

        $urls = array_merge([$this->url], array_map(function (array $variant) {
            return $variant['url'];
        }, $this->variants));

        return array_unique(array_values($urls));
    }
}
