@extends('layouts.app')

@section('content')
<div class="card-body">
    <div class="row">
        

        <div class="col-md-6 offset-md-3"> 
            <div class="form-group">
                <h4>Name</h4>
                <p>{{$employee->name}}</p>
            </div>
            <div class="form-group">
                <h4>Email</h4>
                <p>{{$employee->email}}</p>
            </div>

            <div class="form-group">
                <h4>Phone</h4>
                <p>{{$employee->phone}}</p>
            </div>

            <div class="form-group">
                <h4>Address</h4>
                <p>{{$employee->address}}</p>
            </div>
            
            <div class="form-group">
                <h4>Experience</h4>
                <p>{{$employee->experience}}</p>
            </div>

            <div class="form-group">
                <h4>NID no</h4>
                <p>{{$employee->nid_no}}</p>
            </div>

            <div class="form-group">
                <h4>Salary</h4>
                <p>{{$employee->salary}}</p>
            </div>

            <div class="form-group">
                 <h4>Vacation</h4>
                <p>{{$employee->vacation}}</p>
            </div>

            <div class="form-group">
                <h4>City</h4>
                <p>{{$employee->city}}</p>
            </div>

            <div class="form-group">
                <img id="image" src="{{URL::to($employee->photo)}}" style="height:100px; width:100px; margin:5px auto; border-radius:10px; "/>
            </div>
            <a href="{{route('home')}}" class="btn btn-primary">Home</a>
        </div>
    </div>
</div>


@endsection