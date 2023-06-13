<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'content',
    ];

    public static function getNote($id)
    {
        return Note::find($id);
    }

    public static function getNotes($id)
    {
        return Note::where('category_id', $id)->get();
    }
}
