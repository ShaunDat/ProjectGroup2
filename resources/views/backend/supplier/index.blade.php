@extends('layouts.admin')

@section('title','List Supplier')

@section('header')
    <link rel="stylesheet" href="{{ asset('template/jquery.dataTables.min.css') }}">
@endsection

@section('footer')
    <script src="{{ asset('template/jquery.dataTables.min.js') }}"></script>
    <script> 
    $(document).ready( function () {
      $('#myTable').DataTable();
    } );
  </script>
@endsection

@section('maincontent')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List Supplier</h4>
        <p class="card-description">
          Add Supplier <a href="{{ route('supplier.create') }}" class="btn btn-success btn-rounded btn-fw">Add</a>
          Trash Supplier <a href="{{ route('supplier-trash') }}" class="btn btn-danger btn-rounded btn-fw">Trash</a>
        </p>
        <div class="table-responsive">
          @includeIf('backend.message')
          <table class="table table-striped" id="myTable" >
            <thead>
              <tr class="bg-info">
                <th class="text-center" style="width:20px">#</th>
                <th class="text-center" style="width:50px">Logo</th>
                <th>Name</th>
                <th>Representative</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Slug</th>
                <th>Date created</th>
                <th>Function</th>
                <th class="text-center" style="width:20px">ID</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($list as $row)
              <tr>
                <td class="text-center">
                    <input type="checkbox" name="checkboxid" id="" value=""></td>
                <td>
                    <img src="{{ asset('images/supplier/'. $row->logo) }}" class="img-fluid" alt="Logo"></td>
                <td>
                    {{ $row->name }}</td>
                <td>
                    {{ $row->fullname }}</td>
                <td>
                    {{ $row->email }}</td>
                <td>
                    {{ $row->phone }}</td>
                <td>
                    {{ $row->slug }}</td>
                <td>
                    {{ $row->created_at }}</td>
                <td>
                  @if ($row->status==1)
                    <a href="{{ route('supplier.status',['id'=>$row->id]) }}" 
                      class="btn btn-sm btn-success"><i class="fas fa-toggle-on"></i></a>
                  @else
                  <a href="{{ route('supplier.status',['id'=>$row->id]) }}"
                     class="btn btn-sm btn-danger"><i class="fas fa-toggle-off"></i></a>

                  @endif

                  <a href="{{ route('supplier.show',['supplier'=>$row->id]) }}" 
                    class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                  <a href="{{ route('supplier.edit',['supplier'=>$row->id]) }}" 
                    class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                  <a href="{{ route('supplier.deltrash',['id'=>$row->id]) }}" 
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
