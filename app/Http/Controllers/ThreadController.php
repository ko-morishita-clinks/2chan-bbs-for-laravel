<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreThreadRequest;
use App\Models\Thread;


class ThreadController extends Controller
{
    public function create()
    {
        return view('thread.create');
    }

    public function store(StoreThreadRequest $request)
    {
       try {
            Thread::createThreadWithComment(
                $request->only('title'),
                $request->only('username', 'body')
            );
        } catch (Throwable $e) {
            Log::error($e);
            throw $e;
        }

        return redirect()->route('index');
    }
}
