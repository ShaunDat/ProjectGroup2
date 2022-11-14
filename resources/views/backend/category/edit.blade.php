@extends('layouts.admin')

@section('title','Edit Category')

@section('maincontent')
<div class="main-panel">        
  <div class="content-wrapper" style="min-height: 600px">
      <form class="forms-sample" name="form1" action="{{ route('category.update',['category'=>$category->id]) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Category</h4>
            <p class="card-description">
              Input text
            </p>
              <div class="form-group">
                <label for="name">Name list category</label>
                <input type="text" name="name" value="{{ old('name',$category->name) }}" class="form-control" id="name" placeholder="Name">
                  {{-- @if ($erros->has('name'))
                      <span class=" text-danger">{{ $erros->first('name') }}</span>
                  @endif --}}
              </div>
              <div class="form-group">
                <label for="metadesc">Description</label>
                <input type="text" name="metadesc" value="{{ old('metadesc',$category->metadesc) }}" class="form-control" id="metadesc" placeholder="Description">
                {{-- @if ($erros->has('metadesc'))
                <span class=" text-danger">{{ $erros->first('metadesc') }}</span>
              @endif --}}
              </div>
              <div class="form-group">
                <label for="metakey">Key word</label>
                <input type="text" name="metakey" value="{{ old('metakey',$category->metakey) }}" class="form-control" id="metakey" placeholder="Keyword">
                {{-- @if ($erros->has('metakey'))
                <span class=" text-danger">{{ $erros->first('metadesc') }}</span>
              @endif  --}}
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card" >
          <div class="card-body">
              <h4 class="card-title">Select</h4>
              <p class="card-description">
                Input select                  
              </p>
              <div class="form-group">
                <label for="parentid">Level</label>
                <select class="form-control" id="parentid" name="parentid">
                  <option value="0" >Level 0</option>
                  @foreach ($list_category as $row_category)
                     
                      @if ($row_category->id == $category->parentid)
                      <option selected value="{{ $row_category->id }}">{{ $row_category->name }}</option>
                      @else
                      <option value="{{ $row_category->id }}">{{ $row_category->name }}</option>
                      @endif
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                  <label for="orders">Orders</label>
                  <select class="form-control" id="orders" name="orders">
                    <option value="0" >Orders</option>
                    @foreach ($list_category as $row_category)
                        <option value="{{ $row_category->Orders }}">{{ $row_category->name }}</option>
                    @endforeach
                  </select>
              </div>

              <div class="form-group">
                  <label for="status">Sort</label>
                  <select class="form-control" id="status" name="status">
                    <option value="1" @php
                        echo ($category->status==1)?'selected':'';
                    @endphp>Done update</option>

                    <option value="2" @php
                        echo ($category->status==2)?'selected':'';
                    @endphp>Not update</option>
                      
                  </select>
              </div>
            </div>
          </div>
      </div>
      <button type="submit" class="btn btn-primary mr-2">Submit[Edit]</button>
      <a href="{{ route('category.index') }}" class="btn btn-light">Back</a>
  </form>
  <div
</div>
@endsection