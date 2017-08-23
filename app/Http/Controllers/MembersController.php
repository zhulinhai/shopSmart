<?php

namespace App\Http\Controllers;

use App\Member;
use Carbon\Carbon;
use App\Http\Requests\CreateMemberRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $members = Member::latest('created_at')->get();;
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
        $input = $request->all();
        $head_image = $request->file('head_image');
        if ($head_image)
        {
            $path = $head_image->store('avatars','uploads');
            $input['head_image'] = 'uploads/'.$path;
        }
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
        $head_image = $request->file('head_image');
        if ($head_image)
        {
            $path = $head_image->store('avatars','uploads');
            $input['head_image'] = 'uploads/'.$path;
        }
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

    /**
     * lock the member.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function lock($id)
    {
        $member = Member::findOrFail($id);
        $member['locked'] = 0;
        $member->update();
        return redirect('/members');
    }
}
