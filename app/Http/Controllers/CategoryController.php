<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Session;
use File;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function manageCategory()
    {
        $data['page_title'] = " Category";
        $data['category'] = Category::all();
        return view('dashboard.category', $data);
    }
    public function storeCategory(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories,name',
            'status' => 'required',
        ]);

    	$data = new Category();
        $data->name = $request->name;
        $data->slug = str_slug($request->name);
        $data->status = $request->status;
        $data->save();
        return response()->json($data);

    }
    public function editCategory($product_id)
    {
        $product = Category::find($product_id);
        return response()->json($product);
    }
    public function updateCategory(Request $request,$product_id)
    {
        $product = Category::find($product_id);
        $request->validate([
           'name' => 'required|unique:categories,name,'.$product->id,
           'status' => 'required',
        ]);

        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->status = $request->status;
        $product->save();
        return response()->json($product);
    }
    public function deleteItem($id)
    {
       $d = Category::find($id)->delete();
       $data = Post::where('category_id',$id)->get();
        foreach ($data as $key => $value) {
            File::delete(public_path('assets/images'). '/' .$value->image);
            $value->delete();
        }
        return response()->json($d);
    }

}
