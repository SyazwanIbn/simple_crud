<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory; // untuk generate fake data

    protected $fillable = [  // hanya title dan content yang boleh diisi
        'title',
        'content',

    ];
}
