<?php

namespace App\Http\Controllers;

use App\Gongtham\Members;
use Illuminate\Http\Request;
use Auth;
use paginate;


class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $member = Members::paginate(15);
    //    $members = Members::where('parent_id', 0)->get();
    //    $parent   = $members->parent()->get();
    $genera = Members::with('children')->where('parent_id',0)->get();
       $genera1 = Members::with('children')->where('id',1)->get();
       $genera2 = Members::with('children')->where('id',2)->get();
       $genera3 = Members::with('children')->where('id',3)->get();
       $genera4 = Members::with('children')->where('id',4)->get();
       $genera5 = Members::with('children')->where('id',5)->get();
       $genera6 = Members::with('children')->where('id',6)->get();
       $genera7 = Members::with('children')->where('id',7)->get();
       $genera8 = Members::with('children')->where('id',8)->get();
       $genera9 = Members::with('children')->where('id',9)->get();
       $genera10 = Members::with('children')->where('id',10)->get();
    //    foreach($childrens as $tt2)
    //     {
    //        $pp = $tt2->children()->get();
    //     }
    //         // $tt2 = $childrens->children()->get();
    //    dd($pp);
       
// dd($genera);
    //    dd($member);
        return view('Gongtham.Member.index',compact('member','childrens','genera1','genera2','genera3','genera4','genera5','genera6','genera7','genera8','genera9','genera10','genera'));
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
     * @param  \App\Gongtham\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function show(Members $members)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gongtham\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function edit(Members $members)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gongtham\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Members $members)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gongtham\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function destroy(Members $members)
    {
        //
    }
}
