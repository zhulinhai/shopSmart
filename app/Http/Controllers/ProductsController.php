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
        return view('admin.products.create', ['categories'=>$this->getCategories(), 'product'=>null, 'pdt_content'=>null, 'pdt_images'=>null]);
    }

    public function getCategories()
    {
        $arr = array();
        $categories = DB::table('category')->where('type', '=', 0)->get();
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

        $fileAct1 = $request->input('fileAct1', '');
        $fileAct2 = $request->input('fileAct2', '');
        $fileAct3 = $request->input('fileAct3', '');
        $fileAct4 = $request->input('fileAct4', '');
        $fileAct5 = $request->input('fileAct5', '');

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

        $pdt_content = new PdtContent;
        $pdt_content->product_id = $product->id;
        $pdt_content->content = $content;
        $pdt_content->save();

        if($fileAct1 && $fileAct1 != '') {
            $pdt_images = new PdtImages;
            $pdt_images->image_path = $fileAct1;
            $pdt_images->image_no = 0;
            $pdt_images->product_id = $product->id;
            $pdt_images->save();
        }
        if($fileAct2 && $fileAct2 != '') {
            $pdt_images = new PdtImages;
            $pdt_images->image_path = $fileAct2;
            $pdt_images->image_no = 1;
            $pdt_images->product_id = $product->id;
            $pdt_images->save();
        }
        if($fileAct3 && $fileAct3 != '') {
            $pdt_images = new PdtImages;
            $pdt_images->image_path = $fileAct3;
            $pdt_images->image_no = 2;
            $pdt_images->product_id = $product->id;
            $pdt_images->save();
        }
        if($fileAct4 && $fileAct4 != '') {
            $pdt_images = new PdtImages;
            $pdt_images->image_path = $fileAct4;
            $pdt_images->image_no = 3;
            $pdt_images->product_id = $product->id;
            $pdt_images->save();
        }
        if($fileAct5 && $fileAct5 != '') {
            $pdt_images = new PdtImages;
            $pdt_images->image_path = $fileAct5;
            $pdt_images->image_no = 4;
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

        $fileAct1 = $request->input('fileAct1', '');
        $fileAct2 = $request->input('fileAct2', '');
        $fileAct3 = $request->input('fileAct3', '');
        $fileAct4 = $request->input('fileAct4', '');
        $fileAct5 = $request->input('fileAct5', '');

        $product = Product::findOrFail($id);
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

        $pdt_content = PdtContent::where('product_id', $id)->first();
        $pdt_content->content = $content;
        $pdt_content->update();

        $pdt_images = PdtImages::where('product_id', $id)->get();
        dd($pdt_images);

        $productId = DB::table('pdt_images')->where('product_id', '=', $id );
        if($fileAct1 != '') {
            $pdt_images =  PdtImages::where('image_no', '=', 0 )->union($productId)->first();
            dd($pdt_images);
            if (!$pdt_images) {
                $pdt_images = new PdtImages;
                $pdt_images->image_no = 0;
                $pdt_images->product_id = $id;
                $pdt_images->image_path = $fileAct1;
                $pdt_images->save();
            } else {
                $pdt_images->image_path = $fileAct1;
                $pdt_images->update();
            }

        }
        if($fileAct2 != '') {
            $pdt_images =  PdtImages::where('image_no', '=', 1 )->union($productId)->first();
            if (!$pdt_images) {
                $pdt_images = new PdtImages;
                $pdt_images->image_no = 1;
                $pdt_images->product_id = $id;
                $pdt_images->image_path = $fileAct2;
                $pdt_images->save();
            } else {
                $pdt_images->image_path = $fileAct2;
                $pdt_images->update();
            }
        }
        if($fileAct3 != '') {
            $pdt_images =  PdtImages::where('image_no', '=', 2 )->union($productId)->first();
            if (!$pdt_images) {
                $pdt_images = new PdtImages;
                $pdt_images->image_no = 2;
                $pdt_images->product_id = $id;
                $pdt_images->image_path = $fileAct3;
                $pdt_images->save();
            } else {
                $pdt_images->image_path = $fileAct3;
                $pdt_images->update();
            }
        }
        if($fileAct4 != '') {
            $pdt_images =  PdtImages::where('image_no', '=', 3 )->union($productId)->first();
            if (!$pdt_images) {
                $pdt_images = new PdtImages;
                $pdt_images->image_no = 3;
                $pdt_images->product_id = $id;
                $pdt_images->image_path = $fileAct4;
                $pdt_images->save();
            } else {
                $pdt_images->image_path = $fileAct4;
                $pdt_images->update();
            }

        }
        if($fileAct5 != '') {
            $pdt_images =  PdtImages::where('image_no', '=', 4 )->union($productId)->get();
            if (!$pdt_images) {
                $pdt_images = new PdtImages;
                $pdt_images->image_no = 4;
                $pdt_images->product_id = $id;
                $pdt_images->image_path = $fileAct5;
                $pdt_images->save();
            } else {
                $pdt_images->image_path = $fileAct5;
                $pdt_images->update();
            }
        }

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
        return redirect('/admin/products');
    }
}
