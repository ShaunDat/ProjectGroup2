@extends('layouts.admin')

@section('title','Edit Customer')

@section('maincontent')
<div class="main-panel">        
    <div class="content-wrapper" style="min-height: 600px">
        <form class="forms-sample" name="form1" action="{{ route('customer.update',['customer'=>$customer->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Edit Customer</h4>
                <p class="card-description">
                  Input text
                </p>
                  <div class="form-group">
                    <label for="name">Name Login</label>
                    <input type="text" name="name" value="{{ old('name',$customer->name) }}" class="form-control" id="name" placeholder=" Name Login">
                      {{-- @if ($erros->has('name'))
                          <span class=" text-danger">{{ $erros->first('name') }}</span>
                      @endif --}}
                  </div>
                  <div class="form-group">
                    <label for="fullname">Full Name</label>
                    <input type="text" name="fullname" value="{{ old('fullname',$customer->fullname) }}" class="form-control" id="fullname" placeholder="Full Name">
                      {{-- @if ($erros->has('name'))
                          <span class=" text-danger">{{ $erros->first('name') }}</span>
                      @endif --}}
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password" placeholder="Password">
                      {{-- @if ($erros->has('password'))
                      <span class=" text-danger">{{ $erros->first('password') }}</span>
                    @endif --}}
                    </div>
                    <div class="form-group">
                      <label for="password_re">RePassword</label>
                      <input type="password" name="password_re" value="{{ old('password_re') }}" class="form-control" id="password_re" placeholder="RePassword">
                      {{-- @if ($erros->has('password_re'))
                      <span class=" text-danger">{{ $erros->first('password_re') }}</span>
                    @endif --}}
                    </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{ old('email',$customer->email) }}" class="form-control" id="email" placeholder="Email">
                      {{-- @if ($erros->has('email'))
                          <span class=" text-danger">{{ $erros->first('email') }}</span>
                      @endif --}}
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone',$customer->email) }}" class="form-control" id="phone" placeholder="Phone">
                    {{-- @if ($erros->has('phone'))
                    <span class=" text-danger">{{ $erros->first('phone') }}</span>
                  @endif --}}
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="{{ old('address',$customer->address) }}" class="form-control" id="address" placeholder="Address">
                    {{-- @if ($erros->has('address'))
                    <span class=" text-danger">{{ $erros->first('address') }}</span>
                  @endif --}}
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
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender">
                      <option value="1" {{ $customer-> status == 1 ? 'seleted':'' }}>Male</option>
                      <option value="2" {{ $customer-> status == 2 ? 'seleted':'' }}>Female</option>
                      <option value="3" {{ $customer-> status == 3 ? 'seleted':'' }}>Private</option>
                    </select>
                </div>  
                <div class="form-group">
                  <label for="status">Sort</label>
                  <select class="form-control" id="status" name="status">
                    <option value="1" {{ $customer-> status == 1 ? 'seleted':'' }}>Done update</option>
                    <option value="2" {{ $customer-> status == 2 ? 'seleted':'' }}>Not update</option>
                  </select>
              </div>            
                </div>
              </div>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit[Add]</button>
          <a href="{{ route('customer.index') }}" class="btn btn-light">Back</a>
      </form>
    <div
</div>
@endsection
