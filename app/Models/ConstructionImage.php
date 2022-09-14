<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConstructionImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'constructions_id',
        'image_url'
    ];

    protected $table = 'constructions_images';
}
