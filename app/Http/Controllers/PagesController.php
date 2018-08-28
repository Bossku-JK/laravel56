<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Baum\MoveNotPossibleException;
use App\Gongtham\Page;

class PagesController extends Controller
{

      /**
    * Front page
    */
    public function getIndex() {
        return view('pages.index');
    }

    /**
    * Show case page
    */
    public function getShowCase() {
        return view('pages.showcase');
    }

    /**
    * Services page
    */
    public function getServices() {
        return view('pages.services');
    }

    /**
    * Contact page
    */
    public function getContact() {
        return view('pages.contact');
    }
    
    // ... new code goes here index(), create() and so on.

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $templates = $this->getPageTemplates();
        $orderPages = Page::all();
        return view('admin.pages.create')->with('orderPages', $orderPages);
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
            'title' => 'required',
            'uri' => 'required|unique:pages,uri' ,
            'name' => 'required',
            'icon' => 'required',
            'content' => 'required',
        ]);
        //
        $page = $this->pages->create($request->only('title', 'uri', 'name', 'icon', 'content','template', 'hidden'));

            //  $this->updatePageOrder($page, $request);

      

        return redirect()->route('pages.index')
            ->with('success','บันทึกข้อมูลเรียบร้อย');
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
        // $templates = $this->getPageTemplates();
      
        $pages = $this->pages->findOrFail($id);

          
          $orderPages = $this->pages->orderBy('lft', 'asc')->get();
         

        return view('admin.pages.edit')->with('orderPages', $orderPages)->with('templates', $templates)->with('pages', $pages);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
//     protected function getPageTemplates()
//    {
//        $templates = config('cms.templates');

//        return ['' => ''] + array_combine(array_keys($templates), array_keys($templates));
//    }

//     protected function updatePageOrder(Page $page, Request $request)
//     {
//         if ($request->has('order', 'orderPage')) {
//             try {
//                 $page->updateOrder($request->input('order'), $request->input('orderPage'));
//             } catch (MoveNotPossibleException $e) {
//                 return redirect(route('pages.edit', $page->id))->withInput()->withErrors([
//                     'error' => 'Cannot make a page a child of itself.'
//                 ]);
//             }
//         }
//     }
}
