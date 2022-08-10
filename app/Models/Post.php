<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'content', 
        'slug', 
        'status',
        'penulis',
        'deskripsi',
        'pdf',
        'video1',
        'video2',
        'video3',
        'sound1',
        'sound2',
        'sound3',
    ];
}
