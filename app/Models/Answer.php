<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'letter',
        'content',
        'is_correct'
    ];

    public static function getAnswers($question_id)
    {
        return Answer::where('question_id', $question_id)->inRandomOrder()->get();
    }

}
