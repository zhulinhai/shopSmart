<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Http\Requests\CreateTagRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class TagsController extends Controller
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
        $tags = Category::all();
        return view('admin.tags', ['tags' => $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pNodes = $this->pNodes();
        return view('admin.tags.create', ['pNodes'=>$pNodes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        $tag = $request->all();
        $image = $request->file('image');
        if ($image)
        {
            $path = $image->store('tags','uploads');
            $tag['image'] = 'uploads/'.$path;
        }
        Category::create($tag);
        return redirect('/tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Category::findOrFail($id);
        $pNodes = $this->pNodes();
        return view('admin.tags.edit',['tag'=>$tag, 'pNodes'=>$pNodes]);
    }

    /**
     * 获取顶部标签节点
     * */
    public function pNodes()
    {
        $parents = DB::table('category')->where('parent_id', '=', 0)->get();
        $arr = ['0'=>'顶级标签'];
        foreach($parents as $parent) {
            $arr[$parent->id] = $parent->name;
        }
        return $arr;
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
        $tag = Category::findOrFail($id);
        $input = $request->all();
        $tag->update($input);
        return redirect('/tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Category::findOrFail($id);
        Storage::delete($tag->image);
        Category::destroy($id);
        return redirect('/tags');
    }

    /**
     * upload the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function upfile(Request $request, $id)
//    {
//        $path = $request->file('image')->store('tags','uploads');
//        $tag = Tag::findOrFail($id);
//        $tag['image'] = 'uploads/'.$path;
//        $tag->update();
//        return redirect('/tags');
//    }
}
