<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ScoreDetail;
use App\Models\Answer;
use App\Models\Question;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'user_id',
        'score',
        'total_items',
        'percentage'
    ];

    public function getLeaderBoard($categoryId)
    {
        $allScores = Score::where('category_id', $categoryId)
                        ->orderBy('score', 'desc')
                        ->get();
        $grouped = $allScores->groupBy('user_id');
        $leaderBoard = [];

        foreach ($grouped as $studentScores) {
            $leaderBoard[] = $studentScores[0];
        }

        return $leaderBoard;
    }

    public function getScoreDetails($categoryId, $id) {
        $score = Score::find($id);

        $score->details = ScoreDetail::where('score_id', $id)
            ->orderBy('number', 'asc')
            ->get();

        foreach ($score->details as $data) {
            $data->question = Question::find($data->question_id);
            if ($data->question) {
                $data->question->answers = Answer::getAnswers($data->question_id);
            }
            $data->answer = Answer::find($data->answer_id);  
        }

        return $score;
    }
}
