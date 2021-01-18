@extends('layouts.app')

@section('content')
<div class="card-body">
    <div class="row">
        

        <div class="col-md-6 offset-md-3"> 
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" action="{{ route('insert_product') }}" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Product Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                placeholder="Enter Name" required>
            </div>
            <div class="form-group">
                <select name="category_id" class="form-control mb-3" required>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <select name="supplier_id" class="form-control mb-3" required>
                    @foreach($suppliers as $supplier)
                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Buying Date</label>
                <input type="date" class="form-control" id="exampleInputPassword1" name="buying_date"  required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Expire Date</label>
                <input type="date" class="form-control" id="exampleInputPassword1" name="expire_date" required>
            </div>
            
            <div class="form-group">
                <label for="exampleInputPassword1">Buying Price</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="buying_price" placeholder="Enter buying price" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Selling Price</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="selling_price" placeholder="Enter selling price" required>
            </div>

            <div class="form-group">
                <img id="image" src="#"/>
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