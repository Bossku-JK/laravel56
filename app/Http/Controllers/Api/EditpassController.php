<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Updatepsn;
use App\fileupload;

class EditpassController extends Controller
{
    //
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $updatepsn = Updatepsn::with('ppt2')->get();
      
    // dd($Updatepsn);
// return $Updatepsn->toJson();
        // $Updatepsn = Updatepsn::all();
        // $Updatepsn->with('ppt2');
    return response()->json(["updatepsn"=>$updatepsn]);

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

      $this->validate($request, [
        // 'number_pks' => 'required|max:500',
     ]);
     if($request->birthday == null){
         $date1 = 0000-00-00;
     }else{
        $date1 = $request->birthday;
     }
     if($request->birth_monkday == null){
        $date2 = 0000-00-00;
    }else{
       $date2 = $request->birth_monkday;
    }
     $Updatepsn = Updatepsn::create([
         'number_pks' => request('number_pks'),
         'number_kss' => request('number_kss'),
         'prefix' => request('prefix'),
         'name' => request('name'),
         'lastname' => request('lastname'),
         'monkname' => request('monkname'),
         'birthday' => request('birthday'),
         'birth_monkday' => request('birth_monkday'),
         'school_name' => request('school_name'),
         'wat_name' => request('wat_name'),
         'etc' => request('etc'),
         'contact' => request('contact'),
         'status' => 0,

     ]);

     if ($file = $request->file('image')) {
        $extension = $file->getClientOriginalExtension();
        $name = strval(time()).str_random(10).'.'.$extension;
        $file->move('images', $name);
        $photo = fileupload::create(['name' => $name,'updatepsns_id'=> $Updatepsn->id]);
        
    }


     return response()->json([
         'photo' => $request->file('image'),
         'Updatepsn'    => $Updatepsn,
         'message' => 'Success'
     ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Updatepsn $Updatepsn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Updatepsn = Updatepsn::findOrFail($id);
        return response()->json([
            'Updatepsn'    => $Updatepsn,
            'message' => 'Success'
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
         'name' => 'required|max:500',
         'note' => 'required|max:500'
     ]);
    $Updatepsn = Updatepsn::findOrFail($id);
    $Updatepsn->update($request->all());


     return response()->json([
         'Updatepsn'    => $Updatepsn,
         'message' => 'Success'
     ], 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $delete = Updatepsn::findOrFail($id);
  $delete->delete();
  return 200;
    }
}