@extends('layouts.app')

@section('content')
<div class="card-body">
    <div class="row">
        
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="col-md-6 offset-md-3"> 
            <form method="POST" action="{{ route('update_supplier', ['id' => $supplier->id])}}" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                placeholder="Enter Name" value="{{$supplier->name}}" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="Enter Email"value="{{$supplier->email}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="phone" placeholder="Enter phone number" value="{{$supplier->phone}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="address" placeholder="Enter Address" value="{{$supplier->address}}" required>
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1">Shop Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="shop" value="{{$supplier->shop}}" placeholder="Enter Shop name" required>
            </div>

            <div class="form-group">
                <select name="type" class="form-control mb-3" required>
                    <option value="1">Whole Seller</option>
                    <option value="2">Retailer</option>
                    <option value="3">Distributor</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Account No</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="account_number" value="{{$supplier->account_number}}" placeholder="Enter  AC no" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Bank Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="bank_name" value="{{$supplier->bank_name}}" placeholder="Enter Bank name" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Branch Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="branch_name" value="{{$supplier->branch_name}}" placeholder="Enter Branch name" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">City</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="city" value="{{$supplier->city}}" placeholder="Enter city" required>
            </div>

            <div class="form-group">
                <img id="image" src="#"/>
                <img id="old_image" src="{{URL::to($supplier->photo)}}" style="height:60px; width:60px;"/>
                <label for="exampleInputPassword1">Photo</label>
                <input type="file" name="photo" accept="image/*" class="upload" onchange="readURL(this);">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function readURL(input)
    {
        if(input.files && input.files[0])
        {
            var reader=new FileReader();
            reader.onload=function(e)
            {
                document.getElementById('image').style.display="block";
                document.getElementById('old_image').style.display="none";
                $('#image')
                .attr('src',e.target.result)
                .width(80)
                .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById('image').style.display="none";
</script>
@endsection