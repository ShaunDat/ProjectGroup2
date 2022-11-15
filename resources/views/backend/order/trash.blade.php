
@extends('layouts.admin')

@section('title','List Trash Product')

@section('header')
    <link rel="stylesheet" href="{{ asset('template/jquery.dataTables.min.css') }}">
@endsection

@section('maincontent')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List Trash Product</h4>
        <p class="card-description">
          <a href="{{ route('product.index') }}" class="btn btn-light">Back</a>
        </p>
        <div class="table-responsive">
          @includeIf('backend.message')
          <table class="table table-striped" id="myTable" >
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Slug</th>
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
                    {{ $row->slug }}</td>
                <td>
                    {{ $row->created_at }}</td>
                <td class="text-center">
                  <form action="{{ route('product.destroy',['product'=>$row->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                  <a href="{{ route('product.retrash',['id'=>$row->id]) }}" 
                    class="btn btn-sm btn-info">
                    <i class="fas fa-undo-alt"></i></a>
                  <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                  </button>
                  </form>
                  </td>
                <td class="text-center">
                    {{ $row->id }}</td>
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
  </script>
@endsection