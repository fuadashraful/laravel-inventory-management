<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('layouts.pages.category.addCategory');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ]);
        $data=array();
        $data['category_name']=$request->category_name;

        try
        {
            $category=DB::table('categories')
            ->insert($data);
            $notification=array(
                'message'=>'New Category inserted',
                'alert-type'=>'success'
            );
            return redirect('home')->with($notification);
        }
        catch(Exception $e)
        {
            $notification=array(
                'message'=>'Can not insert Category',
                'alert-type'=>'danger'
            );
            return redirect('home')->with($notification);
        }
    }


    public function get_categories()
    {
        $category=Category::all();
        return view('layouts.pages.category.allCategory',compact('category'));
    }

    public function delete_category($id)
    {
        try
        {
            $category=Category::find($id);
            //dd($category);
            $category->delete();
            $notification=array(
                'message'=>'Category Deleted Successfully',
                'alert-type'=>'warning'
            );
            return redirect('home')->with($notification);
        }
        catch(Exception $e)
        {
            $notification=array(
                'message'=>'Can not Delete Category',
                'alert-type'=>'danger'
            );
            return redirect('home')->with($notification);
        }
    }
}
