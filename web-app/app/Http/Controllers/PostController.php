<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        // request
        $name = $request->name ?? '無し';
        $comment = $request->comment ?? '無し';

        // store
        $eloqentComment = new Comment;
        $eloqentComment->name = $name;
        $eloqentComment->comment = $comment;
        $eloqentComment->save();

        // redirect
        return redirect()->route('hello');
    }
}
