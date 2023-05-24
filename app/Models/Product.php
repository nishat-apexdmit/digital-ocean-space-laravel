<?php

namespace App\Models;

use App\Assets\AssetableContract;
use App\Assets\HasAssets;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements AssetableContract
{
    use HasFactory,HasAssets;
    protected $fillable = [
        'name',
    ];
}
