<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\User;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->id);
//        dd($request->file('picture')->getClientOriginalName());
        $request->file('picture')->store('/public/users');
//        dd($request->file('picture')->hashName());
        $picture=new Picture();
        $picture->name=$request->file('picture')->hashName();
        $picture->user_id=$request->id;
//        dd($picture);
        $picture->save();

        return redirect()->route('users.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Picture $picture)
    {
//        dd($picture->name);
        unlink(storage_path()."/app/public/users/".$picture->name);
        $picture->delete();

        return redirect()->route('users.index');


    }

    public function addPicture(Request $request){
//        dd($request->id);
        $user=User::find($request->id);
//        dd($user);
        return view('pictures.addPicture',[
            'user'=>$user
        ]);
    }






}
