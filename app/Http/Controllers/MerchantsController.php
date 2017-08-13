<?php

namespace App\Http\Controllers;


use App\Merchant;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class MerchantsController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        $merchants = Merchant::all();
        return view('admin.merchants', ['merchants' => $merchants]);
    }

    function newMerchant()
    {
        return view('admin.merchants.new');
    }

    function add(Request $request)
    {
        $imageUrl = $request->file('head_image')->store('uploads');
        $logoUrl = $request->file('logo')->store('uploads');
        $merchant = new Merchant();
        $merchant->name =$request->input('name');
        $merchant->head_image = $imageUrl;
        $merchant->logo = $logoUrl;
        $merchant->address =$request->input('address');
        $merchant->tel =$request->input('tel');
        $merchant->types = '';
        $merchant->save();

        return redirect('/merchants');

    }

    function edit($id)
    {
        $merchant = Merchant::find($id);
        return view('admin.merchants.edit',['merchant'=>$merchant]);
    }

    function destroy($id)
    {
        Merchant::destroy($id);
        return redirect('/merchants');
    }

    function save()
    {

    }
}
