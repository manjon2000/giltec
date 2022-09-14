<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'image_primary',
        'category',
        'status'
    ];
    protected $table = 'constructions';
}
