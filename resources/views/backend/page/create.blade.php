@extends('layouts.admin')

@section('title','Create Page')

@section('maincontent')
<div class="main-panel">        
    <div class="content-wrapper" style="min-height: 600px">
        <form class="forms-sample" name="form1" action="{{ route('page.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Create Page</h4>
              <p class="card-description">
                Input text
              </p>
                <div class="form-group">
                  <label for="title">Name list Page</label>
                  <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Title">
                    {{-- @if ($erros->has('title'))
                        <span class=" text-danger">{{ $erros->first('title') }}</span>
                    @endif --}}
                </div>
                <div class="form-group">
                  <label for="detail">Detail Page</label>
                  <input type="text" name="detail" value="{{ old('detail') }}" class="form-control" id="detail" placeholder="Detail">
                    {{-- @if ($erros->has('name'))
                        <span class=" text-danger">{{ $erros->first('name') }}</span>
                    @endif --}}
                </div>
                <div class="form-group">
                  <label for="metadesc">Description</label>
                  <input type="text" name="metadesc" value="{{ old('metadesc') }}" class="form-control" id="metadesc" placeholder="Description">
                  {{-- @if ($erros->has('metadesc'))
                  <span class=" text-danger">{{ $erros->first('metadesc') }}</span>
                @endif --}}
                </div>
                <div class="form-group">
                  <label for="metakey">Key word</label>
                  <input type="text" name="metakey" value="{{ old('metakey') }}" class="form-control" id="metakey" placeholder="Key word">
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
                    <label for="status">Sort</label>
                    <select class="form-control" id="status" name="status">
                      <option value="1">Done update</option>
                        <option value="2">Not update</option>
                    </select>
                </div>  
              </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Submit[Add]</button>
        <a href="{{ route('page.index') }}" class="btn btn-light">Back</a>
    </form>
    <div
</div>
@endsection
