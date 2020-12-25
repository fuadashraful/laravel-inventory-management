<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use DB;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('layouts.pages.customer.addCustomer');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:customers|max:255',
            'address' => 'required',
            'phone' => 'required|max:13',
            'city' => 'required|max:30',
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shop_name']=$request->shop_name;
        $data['account_number']=$request->account_no;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;

        $image=$request->file('photo');
        // echo "<pre>";
        // print_r($data);
        // exit();

        try
        {
            if($image)
            {
                $image_name=$request->email;
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.".".$ext;
                $upload_path="images/customer/";
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

            $employee=DB::table('customers')
            ->insert($data);
            $notification=array(
                'message'=>'Successfully Customer inserted',
                'alert-type'=>'success'
            );
            return redirect('home')->with($notification);
        }
        catch(Exception $e)
        {
            $notification=array(
                'message'=>'Can not insert Customer',
                'alert-type'=>'danger'
            );
            return redirect('home')->with($notification);
        }

    }

    public function get_customers()
    {
        $customers=Customer::all();
        return view('layouts.pages.customer.allCustomer',compact('customers'));
    }

    public function view_customer($id)
    {
        try
        {
            $customer=Customer::find($id);
            
            return view('layouts.pages.customer.view_customer',compact('customer'));
        }
        catch(Exception $e)
        {
            $notification=array(
                'message'=>'Can not find the employee',
                'alert-type'=>'danger'
            );
            return redirect('home')->with($notification);
        }
    }

    public function edit_customer($id)
    {
        $customer=Customer::find($id);
        return view('layouts.pages.customer.edit_customer',compact('customer'));
    }

    public function update_customer(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required|max:13',
            'city' => 'required|max:30',
        ]);

        try
        {
            $data=array();
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['phone']=$request->phone;
            $data['address']=$request->address;
            $data['shop_name']=$request->shop_name;
            $data['account_number']=$request->account_no;
            $data['bank_name']=$request->bank_name;
            $data['bank_branch']=$request->bank_branch;
            $data['city']=$request->city;

            $image=$request->file('photo');
            $customer=Customer::find($id);
            
            if($image)
            {
                if (File::exists($customer->photo)) {
                    //File::delete($image_path);
                    unlink($customer->photo);
                }
                $image_name=$request->email;
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.".".$ext;
                $upload_path="images/customer/";
                $image_url=$upload_path.$image_full_name;
                
                $success=$image->move($upload_path,$image_full_name);
                $data['photo']=$image_url;
    
            }

            DB::table('customers')->where('id', $id)->update($data);

            $notification=array(
                'message'=>'Customer Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect('home')->with($notification);

        }
        catch(Exception $e)
        {
            $notification=array(
                'message'=>'Can not find the customer',
                'alert-type'=>'danger'
            );
            return redirect('home')->with($notification);
        }        
        
    }

    public function delete_customer($id)
    {
        try
        {
            $customer=Customer::find($id);
            if (File::exists($customer->photo)) {
                //File::delete($image_path);
                unlink($customer->photo);
            }
            $customer->delete();
            $notification=array(
                'message'=>'Customer Delete Successfully',
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
                'message'=>'Can not Delete Customer',
                'alert-type'=>'danger'
            );
            return redirect('home')->with($notification);
        }
    }
    
}
