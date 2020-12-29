<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Supplier;
use Illuminate\Support\Facades\File;

class SupplierController extends Controller
{
    
    public function index()
    {
        return view('layouts.pages.suppliers.addSupplier');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:suppliers|max:255',
            'address' => 'required',
            'phone' => 'required|max:13',
            'city' => 'required|max:30',
            'type'=>'required',
            'shop' => 'required|max:50',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['phone']=$request->phone;
        $data['city']=$request->city;
        $data['type']=$request->type;
        $data['shop']=$request->shop;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['branch_name']=$request->branch_name;

        // echo "<pre>";
        // print_r($data);
        // exit();
        $image=$request->file('photo');
        try
        {
            if($image)
            {
                $image_name=$request->email;
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.".".$ext;
                $upload_path="images/supplier/";
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

            $employee=DB::table('suppliers')
            ->insert($data);
            $notification=array(
                'message'=>'Successfully Supplier inserted',
                'alert-type'=>'success'
            );
            return redirect('home')->with($notification);
        }
        catch(Exception $e)
        {
            $notification=array(
                'message'=>'Can not insert Supplier',
                'alert-type'=>'danger'
            );
            return redirect('home')->with($notification);
        }
    }

    public function get_suppliers()
    {
        $suppliers=Supplier::all();
        return view('layouts.pages.suppliers.allSupplier',compact('suppliers'));
    }

    public function view_supplier($id)
    {
        try
        {
            $supplier=Supplier::find($id);
            
            return view('layouts.pages.suppliers.view_supplier',compact('supplier'));
        }
        catch(Exception $e)
        {
            $notification=array(
                'message'=>'Can not find the supplier',
                'alert-type'=>'danger'
            );
            return redirect('home')->with($notification);
        }
    }

    public function edit_supplier($id)
    {
        $supplier=Supplier::find($id);
        return view('layouts.pages.suppliers.edit_supplier',compact('supplier'));
    }

    public function update_supplier(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required|max:13',
            'city' => 'required|max:30',
            'type'=>'required',
            'shop' => 'required|max:50',
        ]);

        try
        {
            $data=array();
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['address']=$request->address;
            $data['phone']=$request->phone;
            $data['city']=$request->city;
            $data['type']=$request->type;
            $data['shop']=$request->shop;
            $data['account_number']=$request->account_number;
            $data['bank_name']=$request->bank_name;
            $data['branch_name']=$request->branch_name;

            $image=$request->file('photo');
            $supplier=Supplier::find($id);
            
            if($image)
            {
                if (File::exists($supplier->photo)) {
                    //File::delete($image_path);
                    unlink($supplier->photo);
                }
                $image_name=$request->email;
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.".".$ext;
                $upload_path="images/supplier/";
                $image_url=$upload_path.$image_full_name;
                
                $success=$image->move($upload_path,$image_full_name);
                $data['photo']=$image_url;
    
            }

            DB::table('suppliers')->where('id', $id)->update($data);

            $notification=array(
                'message'=>'Supplier Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect('home')->with($notification);

        }
        catch(Exception $e)
        {
            $notification=array(
                'message'=>'Can not find the supplier',
                'alert-type'=>'danger'
            );
            return redirect('home')->with($notification);
        }        
        
    }

    public function delete_supplier($id)
    {
        try
        {
            $supplier=Supplier::find($id);
            if (File::exists($supplier->photo)) {
                //File::delete($image_path);
                unlink($supplier->photo);
            }
            $supplier->delete();
            $notification=array(
                'message'=>'Supplier Delete Successfully',
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
                'message'=>'Can not Delete Supplier',
                'alert-type'=>'danger'
            );
            return redirect('home')->with($notification);
        }
    }
}
