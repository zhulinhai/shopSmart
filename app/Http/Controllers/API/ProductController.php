<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Entity\Product;
use App\Entity\PdtContent;
use App\Entity\PdtImages;
use App\Entity\M3Result;


class ProductController extends Controller {
    public function getProductList() {
        $products = Product::paginate(10);

        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '获取成功';
        $m3_result->count = count($products);
        $m3_result->products = $products;

        return $m3_result->toJson();
    }

    public function getPdtContent($product_id)
    {
        $product = Product::find($product_id);
        $pdt_content = PdtContent::where('product_id', $product_id)->first();
        $pdt_images = PdtImages::where('product_id', $product_id)->get();

        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '获取成功';
        $m3_result->product = $product;
        $m3_result->content = $pdt_content;
        $m3_result->images = $pdt_images;

        return $m3_result->toJson();
    }

}