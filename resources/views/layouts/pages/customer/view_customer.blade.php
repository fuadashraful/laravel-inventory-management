@extends('layouts.app')

@section('content')
<div class="card-body">
    <div class="row">
        

        <div class="col-md-6 offset-md-3"> 
            <div class="form-group">
                <h4>Name</h4>
                <p>{{$customer->name}}</p>
            </div>
            <div class="form-group">
                <h4>Email</h4>
                <p>{{$customer->email}}</p>
            </div>

            <div class="form-group">
                <h4>Phone</h4>
                <p>{{$customer->phone}}</p>
            </div>

            <div class="form-group">
                <h4>Address</h4>
                <p>{{$customer->address}}</p>
            </div>
            
            <div class="form-group">
                <h4>Shop Name</h4>
                <p>{{$customer->shop_name}}</p>
            </div>

            <div class="form-group">
                <h4>Account No</h4>
                <p>{{$customer->account_number}}</p>
            </div>

            <div class="form-group">
                <h4>Bank Name</h4>
                <p>{{$customer->bank_name}}</p>
            </div>

            <div class="form-group">
                 <h4>Bank Branch</h4>
                <p>{{$customer->bank_branch}}</p>
            </div>

            <div class="form-group">
                <h4>City</h4>
                <p>{{$customer->city}}</p>
            </div>

            <div class="form-group">
                <img id="image" src="{{URL::to($customer->photo)}}" style="height:100px; width:100px; margin:5px auto; border-radius:10px; "/>
            </div>
            <a href="{{route('home')}}" class="btn btn-primary">Home</a>
        </div>
    </div>
</div>


@endsection