<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'proyects_id',
        'image_url'
    ];

    protected $table = 'proyects_images';
}
