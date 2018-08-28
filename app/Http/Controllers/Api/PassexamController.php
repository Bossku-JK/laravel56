<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gongtham\Passexam;
use App\Gongtham\Masterschool;

class PassexamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Passexam = Passexam::all();
        // $Passexam = Passexam::paginate(5);
        return response()->json(["Passexam"=>$Passexam]);
    }
    
    public function masterschool()
    {

        $Masterschool1 = Masterschool::chunk(1000, function($users)
        {
            //
        
            return $users;
        });
        
        
    }   
        // $Masterschool = Masterschool::paginate(10);
        // $Passexam = Passexam::paginate(5);
    
    

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

