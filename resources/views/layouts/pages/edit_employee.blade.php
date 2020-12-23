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
            <form method="POST" action="{{ route('update_employee', ['id' => $employee->id])}}" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                placeholder="Enter Name" value="{{$employee->name}}" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="Enter Email" value="{{$employee->email}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="phone" placeholder="Enter phone number" value="{{$employee->phone}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="address" placeholder="Enter Address" value="{{$employee->address}}" required>
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1">Experience</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="experience" placeholder="Enter Experience" value="{{$employee->experience}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">National ID No</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="nid_no" placeholder="Enter  NID" value="{{$employee->nid_no}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Salary</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="salary" placeholder="Enter Salary" value="{{$employee->salary}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Vacation</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="vacation" placeholder="Enter Vacation" value="{{$employee->vacation}}" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">City</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="city" placeholder="Enter city" value="{{$employee->city}}" required>
            </div>

            <div class="form-group">
                <img id="image" src="#" />
                <img id="old_image" src="{{URL::to($employee->photo)}}" style="height:60px; width:60px;"/>
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