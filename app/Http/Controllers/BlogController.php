<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
        
   public function index(Request $request)
    {
        
        /* $blogs = blog::filter($request)->get() ->sortby('topic'); */
        $blogs = blog::filter($request)->orderBy('topic')->paginate(5); 
        return view('blogs.index',compact('blogs')); 
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     /*
            ADDED FOR DYNAMIC DROPDOWN
    */
        $topics = DB::table('blog_topic')
        ->orderby('name','asc')
        ->pluck("name","id");
        return view('blogs.create',compact('topics'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->topic = $request->get('topic');
        $blog->title = $request->get('title');
        $blog->descr = $request->get('descr');
        $blog->save();
 
        return redirect('blogs')->with('success','Blog has been added');
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
        $blog = Blog::find($id);
        $topics = DB::table('blog_topic')
        ->orderby('name','asc')
        ->pluck("name","id");
        return view('blogs.edit',compact('blog','id','topics'));
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
        $blog= Blog::find($id);
        $blog->topic=$request->get('topic');
        $blog->title=$request->get('title');
        $blog->descr=$request->get('descr');
        $blog->save();
        return redirect('blogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$blog = Blog::find($id);
        //dd($id);
        //$blog->delete($id);
        //return redirect('blogs')->with('success','Blog Has Been Deleted');
       
        DB::table("blogs")->delete($id);
        return response()->json(['success'=>"Blog Deleted successfully.", 'tr'=>'tr_'.$id]);

    }
}
