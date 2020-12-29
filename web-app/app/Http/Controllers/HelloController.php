<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class HelloController extends Controller
{
    public function index()
    {
        // get
        $comments = Comment::all();

        // return
        return view('hello', ['comments' => $comments]);
    }
}
