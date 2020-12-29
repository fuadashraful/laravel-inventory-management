@extends('layouts.app')

@section('content')
<div class="card-body">
    <div class="row">
        

        <div class="col-md-6 offset-md-3"> 
            <div class="form-group">
                <h4>Name</h4>
                <p>{{$supplier->name}}</p>
            </div>
            <div class="form-group">
                <h4>Email</h4>
                <p>{{$supplier->email}}</p>
            </div>

            <div class="form-group">
                <h4>Phone</h4>
                <p>{{$supplier->phone}}</p>
            </div>

            <div class="form-group">
                <h4>Address</h4>
                <p>{{$supplier->address}}</p>
            </div>
            
            <div class="form-group">
                <h4>Shop Name</h4>
                <p>{{$supplier->shop}}</p>
            </div>

            <div class="form-group">
                <h4>Type</h4>
                @if ($supplier->type=="1")
                    <p>Whole Seller</p>
                @elseif ($supplier->type=="2")
                    <p>Retailer</p>
                @elseif ($supplier->type=="3")
                    <p>Distributor</p>
                @endif
            </div>

            <div class="form-group">
                <h4>Account No</h4>
                <p>{{$supplier->account_number}}</p>
            </div>

            <div class="form-group">
                <h4>Bank Name</h4>
                <p>{{$supplier->bank_name}}</p>
            </div>

            <div class="form-group">
                 <h4>Bank Branch</h4>
                <p>{{$supplier->branch_name}}</p>
            </div>

            <div class="form-group">
                <h4>City</h4>
                <p>{{$supplier->city}}</p>
            </div>

            <div class="form-group">
                <img id="image" src="{{URL::to($supplier->photo)}}" style="height:100px; width:100px; margin:5px auto; border-radius:10px; "/>
            </div>
            <a href="{{route('home')}}" class="btn btn-primary">Home</a>
        </div>
    </div>
</div>


@endsection