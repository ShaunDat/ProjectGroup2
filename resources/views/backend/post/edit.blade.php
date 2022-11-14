@extends('layouts.admin')

@section('title','Edit Product')

@section('maincontent')
<div class="main-panel">        
    <div class="content-wrapper" style="min-height: 600px">
        <form class="forms-sample" name="form1" action="{{ route('product.update',['product'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body"> 
              <h4 class="card-title">Edit Product</h4>
              <p class="card-description">
                Input text
              </p>
                <div class="form-group">
                  <label for="name">Name list Product</label>
                  <input type="text" name="name" value="{{ old('name',$product->name) }}" class="form-control" id="name" placeholder="Name">
                    {{-- @if ($erros->has('name'))
                        <span class=" text-danger">{{ $erros->first('name') }}</span>
                    @endif --}}
                </div>
                <div class="form-group">
                  <label for="detail">Detail</label>
                  <input type="text" name="detail" value="{{ old('detail',$product->detail) }}" class="form-control" id="detail" placeholder="Detail">
                    {{-- @if ($erros->has('name'))
                        <span class=" text-danger">{{ $erros->first('name') }}</span>
                    @endif --}}
                </div>
                <div class="form-group">
                  <label for="metadesc">Description</label>
                  <input type="text" name="metadesc" value="{{ old('metadesc',$product->metadesc) }}" class="form-control" id="metadesc" placeholder="Description">
                  {{-- @if ($erros->has('metadesc'))
                  <span class=" text-danger">{{ $erros->first('metadesc') }}</span>
                @endif --}}
                </div>
                <div class="form-group">
                  <label for="metakey">Key word</label>
                  <input type="text" name="metakey" value="{{ old('metakey',$product->metakey) }}" class="form-control" id="metakey" placeholder="Key word">
                  {{-- @if ($erros->has('metakey'))
                  <span class=" text-danger">{{ $erros->first('metakey') }}</span>
                @endif  --}}
                </div>
                <div class="form-group">
                  <label for="img">Img</label>
                  <input type="file" name="img" value="{{ old('img') }}" class="form-control" id="img" placeholder="Image">
                    @if (session('imgerror'))
                        <span class=" text-danger">{{ session('imgerror') }}</span>
                    @endif
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
                  <label for="catid">List Categorys</label>
                  <select class="form-control" id="catid" name="catid">
                    <option value="0" >Category</option>
                    @foreach ($list_category as $category)
                      @if ($category->id == $product->catid)
                        <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                      @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endif

                    @endforeach
                  </select>
                  {{-- @if ($erros->has('catid'))
                  <span class=" text-danger">{{ $erros->first('catid') }}</span>
                @endif  --}}
                </div>

                <div class="form-group">
                    <label for="suppid">Orders</label>
                    <select class="form-control" id="suppid" name="suppid">
                      <option value="0" >Orders</option>
                      @foreach ($list_supplier as $supplier)
                        @if ($supplier->id == $product->suppid)
                          <option selected value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @else
                          <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endif

                      @endforeach
                    </select>
                  {{-- @if ($erros->has('suppid'))
                  <span class=" text-danger">{{ $erros->first('suppid') }}</span>
                @endif  --}}
                  </div>  
                  <div class="form-group">
                    <label for="number">Number</label>
                    <input type="number" name="number" value="{{ old('number',$product->number) }}" min="1" class="form-control" id="number" placeholder="Number">
                      {{-- @if ($erros->has('number'))
                          <span class=" text-danger">{{ $erros->first('number') }}</span>
                      @endif --}}
                  </div>

                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" name="price" value="{{ old('price',$product->price) }}" min="10000" class="form-control" id="price" placeholder="Price">
                      {{-- @if ($erros->has('price'))
                          <span class=" text-danger">{{ $erros->first('number') }}</span>
                      @endif --}}
                  </div>

                  <div class="form-group">
                    <label for="pricesale">Price</label>
                    <input type="number" name="pricesale" value="{{ old('pricesale',$product->pricesale) }}" min="10000" class="form-control" id="pricesale" placeholder="Pricesale">
                      {{-- @if ($erros->has('pricesale'))
                          <span class=" text-danger">{{ $erros->first('pricesale') }}</span>
                      @endif --}}
                  </div>                
                  
                <div class="form-group">
                    <label for="status">Sort</label>
                    <select class="form-control" id="status" name="status">
                      <option value="1" {{ $product-> status == 1 ? 'seleted':'' }}>Done update</option>
                      <option value="2" {{ $product-> status == 2 ? 'seleted':'' }}>Not update</option>
                    </select>
                </div>
              </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit[Add]</button>
        <a href="{{ route('product.index') }}" class="btn btn-light">Back</a>
    </form>
    <div
</div>
@endsection
