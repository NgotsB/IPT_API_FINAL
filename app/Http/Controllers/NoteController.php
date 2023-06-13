<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Validator;

class NoteController extends Controller
{
    // Get Notes
    public function index(Request $request, $categoryId)
    {
        $query = Note::where('name', 'LIKE', '%' . $request->search . '%')
            ->where('category_id', '=', $categoryId);
        
        if (empty($query)) {
            return response([
                'message' => 'Note not found.',
            ], 404);
        }
        
        $notes = $query->latest()->paginate(10);

        return response([
            'message' => 'Notes have been retrieved.',
            'data' => [
                'notes' => $notes,
            ]
        ], 200);
    }

    // Get Note Details
    public function show($id)
    {
        $note = Note::find($id);

        return response([
            'message' => 'Note retreived.',
            'data' => [
                'note' => $note,
            ]
        ], 200);
    }


    // Add Note
    public function store(Request $request)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'content' => 'required|string',
            'category_id' => 'required',
        ]);

        if ($validate->fails()) {
            return response([
                'message' => $validate->errors()->first(),
            ], 400);
        }

        $note = Note::create($input);

        return response([
            'message' => 'Note created.',
            'data' => [
                'note' => $note
            ]
        ], 200);
    }

    // Update Note Details
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'content' => 'required|string',
        ]);

        if ($validate->fails()) {
            return response([
                'message' => $validate->errors()->first(),
            ], 400);
        }

        $note = Note::find($id);
        $note->content = $input['content'];
        $note->save();

        return response([
            'message' => 'Note updated.',
            'data' => [
                'note' => $note
            ]
        ], 200);
    }

    // Delete Note
    public function delete($id)
    {
        $note = Note::find($id);
        $note->delete();

        return response([
            'message' => 'Note deleted.',
        ], 200);
    }
}
