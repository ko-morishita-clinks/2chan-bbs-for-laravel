<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    public function index()
    {
        $threads = Thread::with('comments')->latest()->get();

        return view('index', compact('threads'));
    }

    public function store()
    {
    }
}
