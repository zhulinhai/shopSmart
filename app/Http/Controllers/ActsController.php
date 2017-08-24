<?php

namespace App\Http\Controllers;

use App\Act;
use App\Merchant;
use function GuzzleHttp\Psr7\mimetype_from_extension;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ActsController extends Controller
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
        $acts = Act::all();
        return view('admin.acts', ['acts' => $acts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merchants = Merchant::all();
        $arr = array();
        foreach($merchants as $merchant) {
            $arr[$merchant->id] = $merchant->name;
        }
        return view('admin.acts.create', ['merchants' => $arr]);
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
            $path = $head_image->store('acts','uploads');
            $input['head_image'] = 'uploads/'.$path;
        }

        $arr=array();
        $tp = array("image/gif","image/pjpeg","image/jpeg","image/png");    //检查上传文件是否在允许上传的类型
        if($request->hasFile('images')){
            foreach($request->file('images') as $file) {
                $path = $file->store('acts','uploads');
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
        Act::create($input);
        return redirect('/acts');
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
        $act = Act::findOrFail($id);
        $merchants = Merchant::all();
        $arr = array();
        foreach($merchants as $merchant) {
            $arr[$merchant->id] = $merchant->name;
        }
        return view('admin.acts.edit',['act'=>$act, 'merchants' => $arr]);
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
        $act = Act::findOrFail($id);
        $act->name =$request->input('name');
        $act->head_image = $imageUrl;
        $act->logo = $logoUrl;
        $act->address =$request->input('address');
        $act->tel =$request->input('tel');
        $act->types = '';
        $act->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Act::destroy($id);
        return redirect('/acts');
    }

}
