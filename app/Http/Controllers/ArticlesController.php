<?php

namespace App\Http\Controllers;

use App\Entity\Article;
use App\Entity\ArticleContent;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateArticleRequest;

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
        $articles = Article::paginate(10);
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
        $categories = $this->getCategories();
        return view('admin.articles.create', ['categories'=>$categories, 'articleContent'=>null, 'article'=>null]);
    }

    /*
     * 获取分类信息
     * */
    public function getCategories()
    {
        $arr = array();
        $categories = DB::table('category')->where('type', '=', 1)->get();
        foreach($categories as $category) {
            $arr[$category->id] = $category->name;
        }
        return $arr;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request)
    {
        $input = $request->all();
        $content = $request->input('content', '');
        $html = $request->input('mdeditor-html-code', '');
        $summary = $request->input('summary', '');
        if ($summary == '')
        {
            $input['summary'] = mb_substr($content,0,64);
        }

        $article = new Article;
        $article->save($input);

        $article_content = new ArticleContent;
        $article_content->article_id = $article->id;
        $article_content->content = $content;
        $article_content->html = $html;
        $article_content->save();

        return redirect('/admin/articles');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        $articleContent = ArticleContent::findOrFail($id)->content;
        $categories = $this->getCategories();

        return view('admin.articles.show', ['article'=>$article, 'articleContent'=>$articleContent, 'categories'=>$categories]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $articleContent = ArticleContent::findOrFail($id)->content;
        $categories = $this->getCategories();
        return view('admin.articles.edit', ['article'=>$article, 'articleContent'=>$articleContent, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateArticleRequest $request, $id)
    {
        $input = $request->all();
        $content = $request->input('content');
        $html = $request->input('mdeditor-html-code', '');
        $summary = $request->input('summary', '');
        if ($summary == '')
        {
            $input['summary'] = mb_substr($content,0,64);
        }

        $article = Article::findOrFail($id);
        $article->title = $request->input('title', '');
        $article->preview = $request->input('preview', '');
        $article->user_id = $request->input('user_id', 0);
        $article->category = $request->input('category', '');
        $article->summary = $summary;
        $article->update();

        $article_content = ArticleContent::where('article_id', $id)->first();
        $article_content->content = $content;
        $article_content->html = $html;
        $article_content->update();

        return redirect('/admin/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::destroy($id);
        $article_content = ArticleContent::where('article_id', $id)->first();
        ArticleContent::destroy($article_content->id);
        return redirect('/admin/articles');
    }

    /**
     * 增加评论
     **/
    public function addComment($content)
    {
        $this->comments()->create(compact('content', $content));
    }
}
