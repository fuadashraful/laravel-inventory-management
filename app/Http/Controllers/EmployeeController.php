<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('layouts.pages.addEmployee');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:employees|max:255',
            'nid_no' => 'required|unique:employees|max:255',
            'experience'=>'required|max:255',
            'address' => 'required',
            'phone' => 'required|max:13',
            'photo' => 'required',
            'salary' => 'required',
            'city' => 'required|max:30',
            'vacation' => 'required|max:30',
        ]);
        
        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['nid_no']=$request->nid_no;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;
        
        $image=$request->file('photo');

        // echo "<pre>";
        // print_r($data);
        // exit();

        if($image)
        {
            $image_name=$request->nid_no;
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.".".$ext;
            $upload_path="images/employee/";
            $image_url=$upload_path.$image_full_name;

            $success=$image->move($upload_path,$image_full_name);

            if($success)
            {
                $data['photo']=$image_url;
                try
                {
                    $employee=DB::table('employees')
                        ->insert($data);
                    $notification=array(
                        'message'=>'Successfully Employee inserted',
                        'alert-type'=>'success'
                    );
                    return redirect('home')->with($notification);
                }
                catch(Exception $e)
                {
                    $notification=array(
                        'message'=>'Can not insert',
                        'alert-type'=>'danger'
                    );
                    return redirect('home')->with($notification);
                }
            }
            else
            {
                $notification=array(
                    'message'=>'Can not insert',
                    'alert-type'=>'danger'
                );
                return redirect('insert')->with($notification);
            }
        }
        else
        {
            return  redirect()->back();
        }
    }

    public function get_employees()
    {
        $employees=Employee::all();

        return view('layouts.pages.allEmployee',compact('employees'));
    }

    public function delete_employee($id)
    {
        try
        {
            $employee=Employee::find($id);
            if (File::exists($employee->photo)) {
                //File::delete($image_path);
                unlink($employee->photo);
            }
            $employee->delete();
            $notification=array(
                'message'=>'Employee Delete Successfully',
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
                'message'=>'Can not Delete',
                'alert-type'=>'danger'
            );
            return redirect('home')->with($notification);
        }
    }

    public function view_employee($id)
    {
        try
        {
            $employee=Employee::find($id);
            
            return view('layouts.pages.view_employee',compact('employee'));
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


    public function edit_employee($id)
    {
        $employee=Employee::find($id);

        return view('layouts.pages.edit_employee',compact('employee'));
    }

    public function update_employee(Request $request ,$id)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'nid_no' => 'required|max:255',
            'experience'=>'required|max:255',
            'address' => 'required',
            'phone' => 'required|max:13',
            'salary' => 'required',
            'city' => 'required|max:30',
            'vacation' => 'required|max:30',
        ]);
        

        try
        {
            $data=array();
            $data['name']=$request->name;
            $data['email']=$request->email;
            $data['phone']=$request->phone;
            $data['address']=$request->address;
            $data['experience']=$request->experience;
            $data['nid_no']=$request->nid_no;
            $data['salary']=$request->salary;
            $data['vacation']=$request->vacation;
            $data['city']=$request->city;

            $image=$request->file('photo');
            $employee=Employee::find($id);
            
            if($image)
            {
                if (File::exists($employee->photo)) {
                    //File::delete($image_path);
                    unlink($employee->photo);
                }
                $image_name=$request->nid_no;
                $ext=strtolower($image->getClientOriginalExtension());
                $image_full_name=$image_name.".".$ext;
                $upload_path="images/employee/";
                $image_url=$upload_path.$image_full_name;
                
                $success=$image->move($upload_path,$image_full_name);
                $data['photo']=$image_url;
    
            }
            DB::table('employees')->where('id', $id)->update($data);

            $notification=array(
                'message'=>'Employee Updated Successfully',
                'alert-type'=>'success'
            );
            return redirect('home')->with($notification);

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
}
