@extends('layouts.admin')

@section('title','List Product')

@section('header')
    <link rel="stylesheet" href="{{ asset('template/jquery.dataTables.min.css') }}">
@endsection

@section('maincontent')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List Product</h4>
        <p class="card-description">
          Add Product <a href="{{ route('product.create') }}" class="btn btn-success btn-rounded btn-fw">Add</a>
          Trash Product <a href="{{ route('product-trash') }}" class="btn btn-danger btn-rounded btn-fw">Trash</a>
        </p>
        <div class="table-responsive">
          @includeIf('backend.message')
          <table class="table table-striped" id="myTable" >
            <thead>
              <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name product</th>
                <th>Name category</th>
                <th>Supplier </th>
                <th>Date created</th>
                <th>Function</th>
                <th>ID</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($list as $row)
              <tr>
                <td>
                    <input type="checkbox" name="checkboxid" id="" value=""></td>
                <td>
                    {{ $row->name }}</td>
                <td>
                    <img src="{{ asset('images/products/'. $row->img) }}" class="img-fluid" alt="Image"></td>
                <td>
                    {{ $row->name }}</td>
                <td>
                    {{ $row->catname }}</td>
                <td>
                    {{ $row->suppname }}</td>
                <td>
                    {{ $row->created_at }}</td>
                <td>
                  @if ($row->status==1)
                    <a href="{{ route('product.status',['id'=>$row->id]) }}" 
                      class="btn btn-sm btn-success"><i class="fas fa-toggle-on"></i></a>
                  @else
                  <a href="{{ route('product.status',['id'=>$row->id]) }}"
                     class="btn btn-sm btn-danger"><i class="fas fa-toggle-off"></i></a>

                  @endif

                  <a href="{{ route('product.show',['product'=>$row->id]) }}" 
                    class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                  <a href="{{ route('product.edit',['product'=>$row->id]) }}" 
                    class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                  <a href="{{ route('product.deltrash',['id'=>$row->id]) }}" 
                    class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                </td>
                <td>
                    {{ $row->id }}
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

@section('footer')
    <script src="{{ asset('template/jquery.dataTables.min.js') }}"></script>
    <script> 
    $(document).ready( function () {
      $('#myTable').DataTable();
    } );
    $.fn.dataTable.ext.errMode = 'throw';
  </script>
@endsection