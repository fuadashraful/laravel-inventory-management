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
            <form method="POST" action="{{ route('insert_employee') }}" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                placeholder="Enter Name" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="Enter Email" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="phone" placeholder="Enter phone number" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="address" placeholder="Enter Address" required>
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1">Experience</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="experience" placeholder="Enter Experience" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">National ID No</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="nid_no" placeholder="Enter  NID" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Salary</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="salary" placeholder="Enter Salary" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Vacation</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="vacation" placeholder="Enter Vacation" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">City</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="city" placeholder="Enter city" required>
            </div>

            <div class="form-group">
                <img id="image" src="#"/>
                <label for="exampleInputPassword1">Photo</label>
                <input type="file" name="photo" accept="image/*" class="upload" onchange="readURL(this);" required>
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
                $('#image')
                .attr('src',e.target.result)
                .width(80)
                .height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection