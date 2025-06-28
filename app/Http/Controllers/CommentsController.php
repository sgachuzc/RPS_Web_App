<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller {
    
    public function showForm(string $token){
        $comment = Comment::where('token', $token)->firstOrFail();
        return view('participants.comments', ['comment' => $comment]);
    }

    public function store(Request $request, string $token){
        $comment = Comment::where('token', $token)->firstOrFail();

        $params = $request->validate([
            'question_1' => ['required'],
            'question_2' => ['required'],
            'question_3' => ['required'],
            'question_4' => ['required'],
            'question_5' => ['required'],
            'question_6' => ['required'],
            'question_7' => ['required']
        ]);

        $comment->update($params);
        return redirect()->back()->with('success', 'Gracias por tus comentarios');
    }
}
