<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\Resource;

/**
 * Class CategoryResource
 * @package App\Http\Resources
 * @mixin Category
 */
class CategoryResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'icon' => $this->icon
        ];

        if ($this->relationLoaded('children')) {
            $data['children'] = CategoryResource::collection($this->children);
        }

        return $data;
    }
}
