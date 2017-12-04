<?php

namespace App\Http\Controllers;

use App\Entity\Category;
use App\Http\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
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
        $categories = Category::paginate(10);
        return view('admin.categories', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pNodes = $this->pNodes();
        return view('admin.categories.create', ['pNodes'=>$pNodes, 'category'=>'' ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        Category::create($request->all());
        return redirect('/admin/categories');
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
        $category = Category::findOrFail($id);
        $pNodes = $this->pNodes();
        return view('admin.categories.edit',['category'=>$category, 'pNodes'=>$pNodes]);
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
        $category = Category::findOrFail($id);
        $input = $request->all();
        $category->update($input);
        return redirect('/admin/categories');
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
        return redirect('/admin/categories');
    }
}
