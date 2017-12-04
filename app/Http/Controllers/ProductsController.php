<?php

namespace App\Http\Controllers;

use App\Entity\Product;
use App\Entity\PdtContent;
use App\Entity\PdtImages;
use Illuminate\Support\Facades\DB;
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
        $products = Product::paginate(10);
        return view('admin.products', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create', ['categories'=>$this->getCategories(), 'product'=>null, 'pdt_content'=>null, 'pdt_images'=>null]);
    }

    /*
     * 获取分类信息
     * */
    public function getCategories()
    {
        $arr = array();
        $categories = DB::table('category')->where('type', '=', 0)->get();
        foreach($categories as $category) {
            $arr[$category->id] = $category->name;
        }
        return $arr;
    }

    /*
     *  存储或者更新图片文件
     * */
    public function storeOrUpdateImages(CreateProductRequest $request, $id)
    {
        $fileAct1 = $request->input('fileAct1', '');
        $fileAct2 = $request->input('fileAct2', '');
        $fileAct3 = $request->input('fileAct3', '');
        $fileAct4 = $request->input('fileAct4', '');
        $fileAct5 = $request->input('fileAct5', '');

        $fileArr = array($fileAct1, $fileAct2, $fileAct3, $fileAct4, $fileAct5);
        foreach ($fileArr as $key=>$file)
        {
            if ($file != '') {
                $pdt_images =  PdtImages::where('image_no', '=', $key )->where('product_id', '=', $id )->first();
                if ($pdt_images) {
                    $pdt_images->image_path = $file;
                    $pdt_images->update();
                } else {
                    $pdt_images = new PdtImages;
                    $pdt_images->image_no = $key;
                    $pdt_images->product_id = $id;
                    $pdt_images->image_path = $file;
                    $pdt_images->save();
                }
            }
        }

    }

    /*
     * 存储或更新文章内容
     * */
    public function storeOrUpdateContent($content, $html, $id)
    {
        $pdt_content = PdtContent::where('product_id', $id)->first();
        if ($pdt_content) {
            $pdt_content->content = $content;
            $pdt_content->html = $html;
            $pdt_content->update();
        } else {
            $pdt_content = new PdtContent;
            $pdt_content->product_id = $id;
            $pdt_content->content = $content;
            $pdt_content->html = $html;
            $pdt_content->save();

        }

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
        $count = $request->input('count', '');
        $sale_count = $request->input('sale_count', '');
        $status = $request->input('status', '');
        $published_at = $request->input('published_at', '');
        $end_date = $request->input('end_date', '');
        $html = $request->input('', '');

        $product = new Product;
        $product->summary = $summary;
        $product->price = $price;
        $product->category_id = $category_id;
        $product->preview = $preview;
        $product->name = $name;
        $product->count = $count;
        $product->sale_count = $sale_count;
        $product->status = $status;
        $product->published_at = $published_at;
        $product->end_date = $end_date;
        $product->save();

        $this->storeOrUpdateContent($content, $html, $product->id);
        $this->storeOrUpdateImages($request, $product->id);

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
        $pdt_content = DB::table('pdt_content')->where('product_id', '=', $id)->first()->content;
        $images = DB::table('pdt_images')->where('product_id', '=', $id )->get();
        $pdt_images = array(0=>null,1=>null,2=>null, 3=>null, 4=>null);
        foreach ($images as $key=>$image) {
            $pdt_images[$image->image_no] = $image->image_path;
        }
        return view('admin.products.edit',['product'=>$product, 'pdt_content'=>$pdt_content, 'pdt_images'=>$pdt_images, 'categories'=>$this->getCategories()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProductRequest $request, $id)
    {
        $name = $request->input('name', '');
        $summary = $request->input('summary', '');
        $price = $request->input('price', '');
        $category_id = $request->input('category_id', '');
        $preview = $request->input('preview', '');
        $content = $request->input('content', '');
        $count = $request->input('count', '');
        $sale_count = $request->input('sale_count', '');
        $status = $request->input('status', '');
        $published_at = $request->input('published_at', '');
        $end_date = $request->input('end_date', '');
        $html = $request->input('mdeditor-html-code', '');

        $product = Product::findOrFail($id);
        if ($product) {
            $product->summary = $summary;
            $product->price = $price;
            $product->category_id = $category_id;
            $product->preview = $preview;
            $product->name = $name;
            $product->count = $count;
            $product->sale_count = $sale_count;
            $product->status = $status;
            $product->end_date = $end_date;
            $product->published_at = $published_at;
            $product->update();
        }

        $this->storeOrUpdateContent($content, $html, $id);
        $this->storeOrUpdateImages($request, $id);

        return redirect('/admin/products');
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
        PdtContent::destroy(DB::table('pdt_content')->where('product_id', '=', $id)->first()->id);
        $images = DB::table('pdt_images')->where('product_id', '=', $id )->get();
        foreach ($images as $image) {
            if ($image) {
                PdtImages::destroy($image->id);
            }
        }
        return redirect('/admin/products');
    }
}
