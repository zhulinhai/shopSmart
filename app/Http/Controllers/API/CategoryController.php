<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Entity\Category;
use App\Entity\M3Result;

class CategoryController extends Controller
{
    public function getCategoryByParentId($parent_id)
    {
        $categories = Category::where('parent_id', $parent_id)->get();
        return $this->returnResult($categories);
    }

    public function getCategoryAll()
    {
        $categories = Category::all();
        return $this->returnResult($categories);
    }

    private function returnResult($categories)
    {
        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '返回成功';
        $m3_result->categories = $categories;

        return $m3_result->toJson();
    }
}
