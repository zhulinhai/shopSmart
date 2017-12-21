<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Entity\M3Result;
use App\Entity\Ad;

class AdController extends Controller
{

    public function getADList($type) {
        $list = Ad::where('type', $type)->get();

        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '获取成功';
        $m3_result->count = count($list);
        $m3_result->ads = $list;

        return $m3_result->toJson();
    }

}