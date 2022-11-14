@extends('layouts.admin')

@section('title','Edit Supplier')

@section('maincontent')
<div class="main-panel">        
  <div class="content-wrapper" style="min-height: 600px">
      <form class="forms-sample" name="form1" action="{{ route('supplier.update',['supplier'=>$supplier->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Edit Supplier</h4>
              <p class="card-description">
                Input text
              </p>
                <div class="form-group">
                  <label for="name">Name list supplier</label>
                  <input type="text" name="name" value="{{ old('name,$supplier->name') }}" class="form-control" id="name" placeholder="Name">
                    {{-- @if ($erros->has('name'))
                        <span class=" text-danger">{{ $erros->first('name') }}</span>
                    @endif --}}
                </div>
                <div class="form-group">
                  <label for="siteurl">Website</label>
                  <input type="url" name="siteurl" value="{{ old('siteurl, $supplier->siteurl') }}" class="form-control" id="siteurl" placeholder="Website">
                    {{-- @if ($erros->has('siteurl'))
                        <span class=" text-danger">{{ $erros->first('siteurl') }}</span>
                    @endif --}}
                </div>
                <div class="form-group">
                  <label for="logo">Logo</label>
                  <input type="file" name="logo" value="{{ old('logo') }}" class="form-control" id="logo" placeholder="Logo">
                    {{-- @if ($erros->has('logo'))
                        <span class=" text-danger">{{ $erros->first('logo') }}</span>
                    @endif --}}
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" name="address" value="{{ old('address,$supplier->address') }}" class="form-control" id="address" placeholder="Address">
                  {{-- @if ($erros->has('address'))
                  <span class=" text-danger">{{ $erros->first('address') }}</span>
                @endif --}}
                </div>
                <div class="form-group">
                  <label for="metadesc">Description</label>
                  <input type="text" name="metadesc" value="{{ old('metadesc,$supplier->metadesc') }}" class="form-control" id="metadesc" placeholder="Description">
                  {{-- @if ($erros->has('metadesc'))
                  <span class=" text-danger">{{ $erros->first('metadesc') }}</span>
                @endif --}}
                </div>
                <div class="form-group">
                  <label for="metakey">Key word</label>
                  <input type="text" name="metakey" value="{{ old('metakey,$supplier->metakey') }}" class="form-control" id="metakey" placeholder="Key word">
                  {{-- @if ($erros->has('metakey'))
                  <span class=" text-danger">{{ $erros->first('metakey') }}</span>
                @endif  --}}
                </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <h4 class="card-title">Select</h4>
                <p class="card-description">
                  Input select</p>
                  <div class="form-group">
                    <label for="fullname">Name Representative</label>
                    <input type="text" name="fullname" value="{{ old('fullname,$supplier->fullname') }}" class="form-control" id="fullname" placeholder="Name Representative">
                      {{-- @if ($erros->has('fullname'))
                          <span class=" text-danger">{{ $erros->first('fullname') }}</span>
                      @endif --}}
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone number</label>
                    <input type="text" name="phone" value="{{ old('phone,$supplier->phone') }}" class="form-control" id="phone" placeholder="phone number">
                      {{-- @if ($erros->has('phone'))
                          <span class=" text-danger">{{ $erros->first('phone') }}</span>
                      @endif --}}
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ old('email,$supplier->email') }}" class="form-control" id="email" placeholder="Email">
                      {{-- @if ($erros->has('email'))
                          <span class=" text-danger">{{ $erros->first('email') }}</span>
                      @endif --}}
                  </div>
                  <div class="form-group">
                    <label for="status">Sort</label>
                    <select class="form-control" id="status" name="status">
                      <option value="1" @php
                          echo ($supplier->status==1)?'selected':'';
                      @endphp>Done update</option>
  
                      <option value="2" @php
                          echo ($supplier->status==2)?'selected':'';
                      @endphp>Not update</option>
                        
                    </select>
                </div>
              </div>
            </div>
        </div>
      <button type="submit" class="btn btn-primary mr-2">Submit[Edit]</button>
      <a href="{{ route('supplier.index') }}" class="btn btn-light">Back</a>
  </form>
  <div
</div>
@endsection