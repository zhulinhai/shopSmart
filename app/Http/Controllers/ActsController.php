<?php

namespace App\Http\Controllers;

use App\Act;
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
        $Acts = Act::all();
        return view('admin.acts', ['acts' => $Acts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.acts.create');
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

        $images = $request->file('images');
        if ($images)
        {
            $path = $images->store('acts', 'uploads');
            $input['images'] = 'uploads/'.$path;
        }

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
        return view('admin.acts.edit',['act'=>$act]);
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
