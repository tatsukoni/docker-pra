<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    /**
     * no param
     */
    public function delete()
    {
        // delete
        Comment::query()->delete();

        // redirect
        return redirect()->route('hello');
    }
}
