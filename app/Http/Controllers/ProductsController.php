<?php

namespace App\Http\Controllers;

use App\Entity\Product;
use Illuminate\Http\Request;
use App\Entity\PdtContent;
use App\Entity\PdtImages;
use App\Entity\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CreateProductRequest;

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
        $categories = Category::all();
        return view('admin.products.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        $name = $request->input('name', '');
        $summary = $request->input('summary', '');
        $price = $request->input('price', '');
        $category_id = $request->input('category_id', '');
        $preview = $request->input('preview', '');
        $content = $request->input('content', '');

        $fileAct1 = $request->input('fileAct1', '');
        $fileAct2 = $request->input('fileAct2', '');
        $fileAct3 = $request->input('fileAct3', '');
        $fileAct3 = $request->input('fileAct4', '');
        $fileAct5 = $request->input('fileAct5', '');

        $product = new Product;
        $product->summary = $summary;
        $product->price = $price;
        $product->category_id = $category_id;
        $product->preview = $preview;
        $product->name = $name;
        $product->save();

        $pdt_content = new PdtContent;
        $pdt_content->product_id = $product->id;
        $pdt_content->content = $content;
        $pdt_content->save();

        if($fileAct1 != '') {
            $pdt_images = new PdtImages;
            $pdt_images->image_path = $fileAct1;
            $pdt_images->image_no = 1;
            $pdt_images->product_id = $product->id;
            $pdt_images->save();
        }

        return redirect('/admin/products');
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
