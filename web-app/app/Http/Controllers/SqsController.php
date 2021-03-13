<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\HelloJob;

class SqsController extends Controller
{
    public function index()
    {
        \Queue::push(new HelloJob('hello world!'));
        //HelloJob::dispatch('hello world!');
        return response()->json(['message' => 'success'], 202, [], JSON_UNESCAPED_UNICODE);
    }
}
