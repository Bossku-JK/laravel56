<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Tag;
use App\Comment;
use Auth;
use App\Category;
use Image;
use Storage;
use File;

class PostsController extends Controller
{
    public function index()
    {
        // Fetch data in pagination so only 10 posts per page
        // To get all data you may use get() method
        
        
        $posts = Post::orderBy('id', 'DESC')->paginate(5);
      
        return view('admin.posts.index', ['posts' => $posts]);
    }
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
  $tags = Tag::pluck('tag', 'id');
  $category = Category::pluck('category_name', 'id');
  
        // Directly display `posts.create` view blade file
        return view('admin.posts.create',compact('tags','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate and filter user inputted data
        // Refer to `References` for more info
        $this->validate($request, [
            'title'        => 'required',
            'slug'         => 'required|alpha_dash|max:200|unique:posts,slug',
            'summary'      => 'required',
            'content'      => 'required',
            'category_id'      => 'required',
            'image' => 'mimes:jpg,jpeg,png|max:2500',

        ]);

        $Posts = new Post();
        $Posts->title = $request->input('title');
        $Posts->slug = $request->input('slug');
        $Posts->summary = $request->input('summary');
        $Posts->content = $request->input('content');
        $Posts->seo_title = $request->input('seotitle');
        $Posts->seo_description = $request->input('seodescrip');
         $Posts->category_id = $request->input('category_id');
         $Posts->active = isset($request['active']);
       
     
        if (Auth::user()->id ) {
                 $Posts->user_id = Auth::user()->id;
             }
     
             //บันทึกรูป
     if($request->hasFile('image')) {
       $image = $request->file('image');
       $filename = time() . '.' . $image->getClientOriginalExtension();
       $location = public_path('images/posts/' . $filename);
       $locaresize = public_path('images/posts/resize/' . $filename);
       // Image::make($image)->resize(700, 400)->save($location);
       Image::make($image)->resize(50, 50)->save($locaresize);
       // $test = Image::make($image->getRealPath());
       $test = Image::make($image->getRealPath())->resize(1280, 720, function ($constraint) {
         $constraint->aspectRatio();
         // $constraint->upsize();
     });
       $watermark = Image::make('Frame.png')->insert($test, 'center')->save($location);
       $Posts->image = $filename;
     }
     
        $Posts->save();
   
        if (isset($request->tags)) {
          $Posts->tags()->sync($request->tags);
       
        }else {
          $Posts->tags()->sync(array());
 
        }
     
     
     // $request->session()->flash('status', 'บนัทกึข้อมลูเรียบร้อยแล้ว');
     //  return back();
       $request->session()->flash('status', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        return redirect()->route('admin.posts.index');
           // ->with('success','Pages created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail( $id );

        return view('admin.posts.show', [ 'post' => $post ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail( $id );
        $tags = Tag::pluck('tag', 'id');
        $category = Category::pluck('category_name', 'id');

        return view('admin.posts.edit')->with('post', $post)->with('tags', $tags)->with('category', $category);
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
        $user = Post::find($id);

        $this->validate($request, [
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,'.$user->id,
            'summary' => 'required',
            'content' => 'required',
     'image' => 'mimes:jpg,jpeg,png|max:2500',
        ]);
       $Posts = Post::find($id);
     $request['active'] = isset($request['active']) ? 1 : 0;
     
     if($request->hasFile('image')) {
       $image = $request->file('image');
       $filename = time() . '.' . $image->getClientOriginalExtension();
       $location = public_path('images/posts/' . $filename);
       $locaresize = public_path('images/posts/resize/' . $filename);
       // Image::make($image)->resize(700, 400)->save($location);
       // $test = Image::make($image->getRealPath());
       $test = Image::make($image->getRealPath())->resize(1280, 720, function ($constraint) {
         $constraint->aspectRatio();
         $constraint->upsize();
     });
       $watermark = Image::make('Frame.png')->insert($test, 'center')->save($location);
         Image::make($image)->resize(50, 50)->save($locaresize);
       $oldFilename = $Posts->image;
     
       $Posts->image = $filename;
     
       Storage::delete($oldFilename);
       File::delete(public_path() . '\\images\post\\' . $oldFilename);
      File::delete(public_path() . '\\images\resize\\' . $oldFilename);
     }
     
     
         $Posts->update($request->all());
     
        if (isset($request->tags)) {
          $Posts->tags()->sync($request->tags);
       //   $Posts->Category()->sync($request->Category);
        }else {
          $Posts->tags()->sync(array());
       //   $Posts->Category()->sync(array());
        }


        return redirect()->route('admin.posts.index')
        ->with('status','อัพเดทข้อมูลเรียบร้อยแล้ว');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve records and throw an exception if a model is not found
        $post = Post::find($id);
        $post->tags()->detach();
        //$post->Category()->detach();
        $oldFilename = $post->image;
         if ($oldFilename != 'demo.jpg')
     
     
          {            Storage::delete($oldFilename);
              File::delete(public_path() . '\\images\posts\\' . $oldFilename);
             File::delete(public_path() . '\\images\posts\resize\\' . $oldFilename);
                          }
        Post::destroy($id);
     
        return redirect()->route('admin.posts.index')
            ->with('status', 'ลบข้อมูลเรียบร้อยแล้ว');
    }
  
      
      
    
}
