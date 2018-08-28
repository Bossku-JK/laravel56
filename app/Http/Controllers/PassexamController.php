<?php

namespace App\Http\Controllers;

use App\Gongtham\Passexam;
use Illuminate\Http\Request;

class PassexamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        
        return view('Gongtham.passexam.index');
    }
    

public function inbox(){
    return view('Gongtham.chat.index');
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gongtham\Passexam  $passexam
     * @return \Illuminate\Http\Response
     */
    public function show(Passexam $passexam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gongtham\Passexam  $passexam
     * @return \Illuminate\Http\Response
     */
    public function edit(Passexam $passexam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gongtham\Passexam  $passexam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Passexam $passexam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gongtham\Passexam  $passexam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Passexam $passexam)
    {
        //
    }
}
