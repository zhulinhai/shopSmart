<?php

namespace App\Http\Controllers;

use App\Member;
use Carbon\Carbon;
use App\Http\Requests\CreateMemberRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;

class MembersController extends Controller
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
     * php artisan make:controller MembersController --resource
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        return view('admin.members', ['members'=>$members]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.members.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMemberRequest $request)
    {
        if($request->hasFile('head_image')){
            foreach($request->file('head_image') as $file) {
                $file->move(base_path().'/public/uploads/', $file->getClientOriginalName());
            }
        }

        $input = $request->all();
//        $input['head_image'] = $path;
        $input['last_login_time'] = Carbon::now()->toDateTimeString();
        Member::create($input);
        return redirect('/members');
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
        $member = Member::findOrFail($id);
        return view('admin.members.edit', ['member'=>$member]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateMemberRequest $request, $id)
    {
        $member = Member::findOrFail($id);
        $input = $request->all();
        $input['last_login_time'] = Carbon::now()->toDateTimeString();
        $member->update($input);

        return redirect('/members');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::destroy($id);
        return redirect('/members');
    }

    public function lock($id)
    {
        $member = Member::findOrFail($id);
        $member['locked'] = 0;
        $member->update();

        return redirect('/members');
    }
}
