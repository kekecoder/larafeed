<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    //
    public function comment(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $comment = new Comments;
        $comment->comment = $request['comment'];
        $comment->save();

        return back()->with('success', 'Comment posted');
    }
}