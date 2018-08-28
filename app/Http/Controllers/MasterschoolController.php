<?php

namespace App\Http\Controllers;

use App\Masterschool;
use Illuminate\Http\Request;

class MasterschoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Masterschool = Masterschool::paginate(10);
        // $Passexam = Passexam::paginate(5);
        return response()->json(["Masterschool"=>$Masterschool]);
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
     * @param  \App\Masterschool  $masterschool
     * @return \Illuminate\Http\Response
     */
    public function show(Masterschool $masterschool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Masterschool  $masterschool
     * @return \Illuminate\Http\Response
     */
    public function edit(Masterschool $masterschool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Masterschool  $masterschool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masterschool $masterschool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Masterschool  $masterschool
     * @return \Illuminate\Http\Response
     */
    public function destroy(Masterschool $masterschool)
    {
        //
    }
}
