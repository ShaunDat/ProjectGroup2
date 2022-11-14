@extends('layouts.admin')

@section('title','Create Topic')

@section('maincontent')
<div class="main-panel">        
    <div class="content-wrapper" style="min-height: 600px">
        <form action="{{ route('topic.store') }}" method="POST">
        @csrf
        <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Create Topic</h4>
              <p class="card-description">
                Input text
              </p>
                <div class="form-group">
                  <label for="name">Name list topic</label>
                  <input type="text" name="name"value="{{ old('name') }}" class="form-control" id="name" placeholder="Name">
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
                    @foreach ($list_topic as $topic)
                        <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                    <label for="orders">Orders</label>
                    <select class="form-control" id="orders" name="orders">
                      <option value="0" >Orders</option>
                      @foreach ($list_topic as $topic)
                          <option value="{{ $topic->id }}">{{ $topic->name }}</option>
                      @endforeach
                    </select>
                </div>

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
        <a href="{{ route('topic.index') }}" class="btn btn-light">Back</a>
    </form>
    <div
</div>
@endsection
