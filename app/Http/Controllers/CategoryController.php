<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Score;
use App\Models\Note;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    // Get Categories
    public function index(Request $request)
    {
        $query = Category::where('name', 'LIKE', '%' . $request->search . '%');
        
        if (empty($query)) {
            return response([
                'message' => 'Categories not found.',
            ], 404);
        }
        
        $categories = $query->latest()->paginate(10);

        foreach ($categories as $category) {
            $category->total_questions = Question::getTotalQuestions($category->id);
        }


        return response([
            'message' => 'Categories have been retrieved.',
            'data' => [
                'categories' => $categories,
            ]
        ], 200);
    }

    // Get Category Details
    public function show($id)
    {
        $step = 0;
        $category = Category::find($id);

        if (!$category) {
            return response([
                'message' => 'Category not found.',
            ], 400);
        }

        $category->total_questions = Question::getTotalQuestions($category->id);
        
        $randomized = !(auth('sanctum')->check());

        $category->questions = Question::getQuestions($category->id, $randomized);
        // $category->scores = Score::getLeaderBoard($category->id);

        // foreach ($category->scores as $score) {
        //     $score->student = User::find($score->user_id);
        //     $score->details = Score::getScoreDetails($id, $score->id)['details'];
        // }

        $category->notes = Note::getNotes($category->id);

        foreach ($category->questions as $question) {
            $question->answers = Answer::getAnswers($question->id);
        }

        return response([
            'message' => 'Category retreived.',
            'data' => [
                'category' => $category,
            ]
        ], 200);
    }


    // Add Category
    public function store(Request $request)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'name' => 'required|string|unique:categories,name',
            'level' => 'required',
            'instructions' => 'required',
        ]);

        if ($validate->fails()) {
            return response([
                'message' => $validate->errors()->first(),
            ], 400);
        }

        $category = Category::create($input);

        return response([
            'message' => 'Category created.',
            'data' => [
                'category' => $category
            ]
        ], 200);
    }

    // Update Category Details
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'name' => 'required|string',
            'level' => 'required',
            'instructions' => 'required',
        ]);

        if ($validate->fails()) {
            return response([
                'message' => $validate->errors()->first(),
            ], 400);
        }

        $category = Category::findOrFail($id);
        $category->name = $input['name'];
        $category->level = $input['level'];
        $category->instructions = $input['instructions'];
        $category->save();

        return response([
            'message' => 'Category updated.',
            'data' => [
                'category' => $category
            ]
        ], 200);
    }

    // Delete Category
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response([
            'message' => 'Category deleted.',
        ], 200);
    }
}
