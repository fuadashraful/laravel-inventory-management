@extends('layouts.app')

@push('css-plugins')
<link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">DataTables with Hover</h6>
        </div>
        <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
            <thead class="thead-light">
                <tr>
                <th>Name</th>
                <th>Buy Date</th>
                <th>Expire Date</th>
                <th>Buy Price</th>
                <th>Selling Price</th>
                <th>Photo</th>
                <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Buy Date</th>
                    <th>Expire Date</th>
                    <th>Buy Price</th>
                    <th>Selling Price</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->buying_date}}</td>
                    <td>{{$product->selling_date}}</td>
                    <td>{{$product->buying_price}}</td>
                    <td>{{$product->selling_price}}</td>
                    <td>
                        <img src="{{ URL::to($product->photo)}}" style="height:60px; width:60px;"/>
                    </td>
                    <td>
                        <a href="" data-toggle="modal" data-target="#basicModal" class="btn btn-sm btn-danger">Delete</a>           
                        <!-- basic modal -->
                        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Are You Sure to Delete Supplier</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-footer">
                                
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <a href="{{route('delete_product', ['id' => $product->id])}}" class="btn btn-success">Yes</a>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- End Modal -->
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>

@endsection

@push('js-plugins')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>


  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
@endpush