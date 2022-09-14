<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyect extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'title',
        'image_primary',
        'status'
    ];

    protected $table = 'proyects';
}
