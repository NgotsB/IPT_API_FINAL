<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'number',
        'content',
        'category_id'
    ];

    public static function getQuestions($categoryId, $randomize)
    {      
        $query = Question::where('category_id', $categoryId);

        if ($randomize) {
            $query->inRandomOrder();
        }
        return $query->get();
    }

    public static function getTotalQuestions($categoryId)
    {
        return Question::where('category_id', $categoryId)->count();
    }
}
