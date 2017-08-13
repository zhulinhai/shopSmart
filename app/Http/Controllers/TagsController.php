<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $tags = Tag::all();
        return view('admin.tags');
    }

    function newTag()
    {
        return view('admin.tags.new');
    }
}
