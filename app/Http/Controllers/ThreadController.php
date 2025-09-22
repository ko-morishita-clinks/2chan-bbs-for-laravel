<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function create()
    {
        return view('thread.create');
    }

    public function store()
    {
    }
}
