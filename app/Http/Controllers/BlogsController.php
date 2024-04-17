<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function add(){
        return view('blogs.add');
    }

    public function addblogs(Request $request){
        $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
        Blogs::create([
            'title'=>$request->title,
            'content'=>$request->content,
        ]);
        return redirect('viewblogs')->with('success','Blogs added successfully!');
    }

    public function view(){
        $blogs = Blogs::all();
        return view('blogs.view',compact('blogs'));
    }

    public function delete(int $id){
        $request=Blogs::findOrFail($id);
        $request->delete();
        return redirect('viewblogs')->with('success','Blogs deleted successfully!');
    }

    public function edit(int $id){
        $blogs=Blogs::findOrFail($id);
        return view('blogs.edit',compact('blogs'));
    }

    public function editblogs(int $id,Request $request){
        $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);

        $blogs=Blogs::findOrFail($id);
        $blogs->update([
            'title'=>$request->title,
            'content'=>$request->content,
        ]);
        return redirect('viewblogs')->with('success','Blogs edited successfully!');
    }
}
