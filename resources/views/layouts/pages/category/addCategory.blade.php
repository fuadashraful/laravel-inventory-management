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
            <form method="POST" action="{{ route('insert_category') }}" enctype="multipart/form-data">
                @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="category_name"
                placeholder="Enter Name" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection