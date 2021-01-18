<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Supplier;
use App\Product;
use DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories=Category::all();
        $suppliers=Supplier::all();
       // dd($categories);
       return view('layouts.pages.product.addProduct',compact('categories','suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'buying_date' => 'required',
            'expire_date' => 'required',
            'buying_price'=>'required',
            'selling_price'=>'required',
            'photo'=>'required',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['category_id']=$request->category_id;
        $data['supplier_id']=$request->supplier_id;
        $data['buying_date']=$request->buying_date;
        $data['expire_date']=$request->expire_date;
        $data['buying_price']=$request->buying_price;
        $data['selling_price']=$request->selling_price;
        
        // dd($data);
        $image=$request->file('photo');
        // echo "<pre>";
        // print_r($data);
        // exit();
        $time=date('Y-m-d H:i:s');
      //  dd($time);
        try
        {
            if($image)
            {
                $image_name=$time;
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.".".$ext;
                $upload_path="images/products/";
                $image_url=$upload_path.$image_full_name;
    
                $success=$image->move($upload_path,$image_full_name);
                if($success)
                {
                    $data['photo']=$image_url;
                }
                else
                {
                    $data['photo']=$image;
                }
            }
            else
            {
                $data['photo']=$image;
            }

            $product=DB::table('products')
            ->insert($data);
            $notification=array(
                'message'=>'Peoduct inserted successfully',
                'alert-type'=>'success'
            );
            return redirect('home')->with($notification);
        }
        catch(Exception $e)
        {
            $notification=array(
                'message'=>'Can not insert Product',
                'alert-type'=>'danger'
            );
            return redirect('home')->with($notification);
        }

    }

    public function get_products()
    {
        $products=Product::all();
        return view('layouts.pages.product.allProduct',compact('products'));
    }

    public function delete_product($id)
    {
        try
        {
            $product=Product::find($id);
            if (File::exists($product->photo)) {
                //File::delete($image_path);
                unlink($product->photo);
            }
            $product->delete();
            $notification=array(
                'message'=>'Product Delete Successfully',
                'alert-type'=>'warning'
            );
           // echo $employee->photo;
          //  dd($employee);
            //exit();
            return redirect('home')->with($notification);
        }
        catch(Exception $e)
        {
            $notification=array(
                'message'=>'Can not Delete Product',
                'alert-type'=>'danger'
            );
            return redirect('home')->with($notification);
        }
    }
}
