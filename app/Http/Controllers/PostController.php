<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Session;
use File;
use App\Post;
use App\Category;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function create()
    {
    	$data['category'] = Category::whereStatus(1)->get();
        $data['page_title'] = "Create New Post";
        return view('post.create',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required|max:60|unique:posts,title',
           'category' => 'required',
            'image' => 'required|mimes:png,jpeg,jpg',
            'tags' => 'required',
            'description' => 'required',
        ]);
        
        $data['user_id'] = $request->userId;
        $data['category_id'] = $request->category;
        $data['title'] = $request->title;
        $data['slug'] = str_slug($request->title);
        $data['tags'] = $request->tags;
        $data['description'] = $request->description;
    	$data['fetured'] =  $request->fetured == 'on' ? '1' : '0';  

        if($request->hasFile('image')){
	        $image = $request->file('image');
	        $image_name = str_random(20);
	        $ext = strtolower($image->getClientOriginalExtension());
	        $image_full_name = $image_name . '.' . $ext;
	        $location = ('assets/images/post'). '/' . $image_full_name;
	        Image::make($image)->resize(800,540)->save($location);
	        $data['image'] = $image_full_name;
        }

        Post::create($data);
        session()->flash('message', 'Post Created Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function index()
    {
        $data['page_title'] = "All Post";
        $data['testimonial'] = Post::orderBy('id','desc')->paginate(10);
        return view('post.index',$data);
    }
    public function edit($id)
    {
    	$data['category'] = Category::whereStatus(1)->get();
        $data['page_title'] = "Edit Post";
        $data['testimonial'] = Post::findOrFail($id);
        return view('post.edit',$data);
    }

    public function update(Request $request)
    {
        $r = Post::find($request->id);
    	$request->validate([
           'title' => 'required|max:60|unique:posts,title,'.$r->id,
            'image' => 'mimes:png,jpeg,jpg',
        ]);

        $data['user_id'] = $request->userId;
        $data['category_id'] = $request->category;
        $data['title'] = $request->title;
        $data['slug'] = str_slug($request->title);
        $data['tags'] = $request->tags;
    	$data['description'] = $request->description;
        $data['fetured'] =  $request->fetured == 'on' ? '1' : '0';  
    	
        if($request->hasFile('image')){
        	File::delete(('./assets/images/post'). '/' .$r->image);
	        $image = $request->file('image');
	        $image_name = str_random(20);
	        $ext = strtolower($image->getClientOriginalExtension());
	        $image_full_name = $image_name . '.' . $ext;
	        $location = ('assets/images/post'). '/' . $image_full_name;
	        Image::make($image)->resize(800,540)->save($location);
	        $data['image'] = $image_full_name;
        }
        $r->update($data);
        session()->flash('message', 'Post Update Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $testimonial = Post::findOrFail($request->id);
        File::delete(('./assets/images/post'). '/' .$testimonial->image);
        $testimonial->delete();
        session()->flash('message', 'Post Deleted Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        return redirect()->back();
    }

    public function publish(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);
        $data = Post::findOrFail($request->id);
        if ($data->status == 1){
            $data->status = 0;
            $data->save();

	        session()->flash('message', 'Post Unpublish Successfully.');
	        Session::flash('type', 'success');
	        Session::flash('title', 'Success');
        }else{
            $data->status = 1;
            $data->save();

        session()->flash('message', 'Post Publish Successfully.');
        Session::flash('type', 'success');
        Session::flash('title', 'Success');
        }
        return redirect()->back();
    }


}
