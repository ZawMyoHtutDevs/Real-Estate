<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'asset',
        'price',
        'description',
        'type_id',
        'category_id',
        'city_id',
        'user_id',
        'status',
        'unique_code',
    ];

    public function type()
    {
        return $this->belongsTo(\App\Models\Type::class, 'type_id');
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    public function region()
    {
        return $this->belongsTo(\App\Models\Region::class, 'region_id');
    }

    public function city()
    {
        return $this->belongsTo(\App\Models\City::class, 'city_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function att_values()
    {
        return $this->hasMany(\App\Models\AttributeValue::class, 'listing_id');
    }

    public function images()
    {
        return $this->hasMany(\App\Models\Image::class, 'listing_id');
    }
}
