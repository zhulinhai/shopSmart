<?php

namespace App\Http\Controllers;

use App\Entity\Product;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
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


    public function index()
    {
        $products = Product::all();
        return view('admin.products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $head_image = $request->file('head_image');
        if ($head_image)
        {
            $path = $head_image->store('products','uploads');
            $input['head_image'] = 'uploads/'.$path;
        }

        $arr=array();
        $tp = array("image/gif","image/pjpeg","image/jpeg","image/png");    //检查上传文件是否在允许上传的类型
        if($request->hasFile('images')){
            foreach($request->file('images') as $file) {
                $path = $file->store('products','uploads');
                $realPath = 'uploads/'.$path;
                if(!in_array(mime_content_type($realPath),$tp)){
                    echo "<script language='javascript'>alert(\"文件类型错误!\");</script>";
                    exit;
                }
                $arr[] = $realPath;
            }
        }
        $images = (\GuzzleHttp\json_encode($arr));
        $input['images'] = $images;
        Product::create($input);
        return redirect('/products');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
//        $merchants = Merchant::all();
//        $arr = array();
//        foreach($merchants as $merchant) {
//            $arr[$merchant->id] = $merchant->name;
//        }
        return view('admin.products.edit',['product'=>$product]);
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
        $imageUrl = $request->file('head_image')->store('avatars');
        $logoUrl = $request->file('logo')->store('avatars');
        $product = Product::findOrFail($id);
        $product->name =$request->input('name');
        $product->head_image = $imageUrl;
        $product->logo = $logoUrl;
        $product->address =$request->input('address');
        $product->tel =$request->input('tel');
        $product->types = '';
        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/products');
    }
}
