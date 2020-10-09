<?php

namespace App\Http\Controllers;

use App\Campany;
use Illuminate\Http\Request;

class CampanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $campany= Campany::findOrfail($id)->first();
        Campany::create($request->all());
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Campany  $campany
     * @return \Illuminate\Http\Response
     */
    public function show(Campany $campany)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Campany  $campany
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $campany= Campany::where('id',$id)->get();
        return view('company.edit',compact('campany'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Campany  $campany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $campany= Campany::where('id',$id)->first();
        $campany->update($request->all());
        return back()->with('success','Company Info Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Campany  $campany
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campany $campany)
    {
        //
    }
}
