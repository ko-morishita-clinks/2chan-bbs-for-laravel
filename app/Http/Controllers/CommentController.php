<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Thread;
use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    public function index()
    {
        $threads = Thread::with('comments')->latest()->get();

        return view('index', compact('threads'));
    }

    public function store(StoreCommentRequest $request)
    {
        try {
            Comment::createComment($request->validated());
        } catch (\Throwable $e) {
            \Log::error($e);
            return back()->withErrors(['error' => 'コメントの保存に失敗しました']);
        }

        return redirect()->route('index');
    }
}
