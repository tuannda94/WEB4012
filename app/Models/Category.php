<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory; //trait

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
        'status',
        'slug'
    ];
}
