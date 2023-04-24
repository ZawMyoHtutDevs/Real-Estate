<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_info',
        'description',
        'listing_id'
    ];

    public function listing()
    {
        return $this->belongsTo(\App\Models\Listing::class, 'listing_id');
    }
}
