<?php

namespace App\Http\Controllers;

use App\Article;
use App\ArticleTag;
use Illuminate\Http\Request;

use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles', ['articles'=>$articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title'   => 'required|max:100',
            'content' => 'required',
            'tags'    => array('required', 'regex:/^\w+$|^(\w+,)+\w+$/'),
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {
            $article = Article::create(Input::only('title', 'content','reso'));
            $article->user_id = Auth::id();
            $resolved_content = Markdown::parse(Input::get('content'));
            $article->resolved_content = $resolved_content;
            $tags = explode(',', Input::get('tags'));
            if (str_contains($resolved_content, '<p>')) {
                $start = strpos($resolved_content, '<p>');
                $length = strpos($resolved_content, '</p>') - $start - 3;
                $article->summary = substr($resolved_content, $start + 3, $length);
            } else if (str_contains($resolved_content, '</h')) {
                $start = strpos($resolved_content, '<h');
                $length = strpos($resolved_content, '</h') - $start - 4;
                $article->summary = substr($resolved_content, $start + 4, $length);
            }

            $article->save();

            foreach ($tags as $tagName) {
                $tag = ArticleTag::whereName($tagName)->first();
                if (!$tag) {
                    $tag = ArticleTag::create(array('name' => $tagName));
                }
                $tag->count++;
                $article->tags()->save($tag);
            }

            return Redirect::route('article.show', $article->id);
        } else {
            return Redirect::route('article.create')->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return View::make('articles.show')->with('article', Article::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function preview() {
        return Markdown::parse(Input::get('content'));
    }
}
