<?php

namespace App\Http\Controllers;


use App\Entity\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MerchantsController extends Controller
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
        $merchants = Merchant::all();
        $categories = $this->getCategories();
        return view('admin.merchants', ['merchants' => $merchants, 'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->getCategories();
        return view('admin.merchants.create', ['merchant'=>null, 'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Merchant::create($request->all());
        return redirect('/admin/merchants');
    }

    /*
     * 获取分类信息
     * */
    public function getCategories()
    {
        $arr = array();
        $categories = DB::table('category')->where('type', '=', 2)->get();
        foreach($categories as $category) {
            $arr[$category->id] = $category->name;
        }
        return $arr;
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
     * Show the form for editing the specified res ource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $merchant = Merchant::findOrFail($id)->first();
        $categories = $this->getCategories();
        return view('admin.merchants.edit',['merchant'=>$merchant, 'categories'=>$categories]);
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
        $merchant = Merchant::findOrFail($id)->first();
        $merchant->update($request->all());

        return redirect('/admin/merchants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Merchant::destroy($id);
        return redirect('/admin/merchants');
    }
}
