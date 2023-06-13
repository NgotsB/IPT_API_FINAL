<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
        'instructions',
    ];

    public static function getCategory($categoryId)
    {
        return Category::find($categoryId);
    }
}
