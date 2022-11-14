@extends('layouts.admin')

@section('title','Detail list category')

@section('maincontent')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
              <a href="{{ route('category.index') }}" class="btn btn-light">Back</a>
            </div>
            <div class="col-12 col-xl-4">
             <div class="justify-content-end d-flex">
              <div class="dropdown flex-md-grow-1 flex-xl-grow-0">

              </div>
             </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 grid-margin transparent">
          <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Value</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">0</th>
                        <td>Id</td>
                        <td>{{ $category->id }}</td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>Name</td>
                        <td>{{ $category->name }}</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Slug</td>
                        <td>{{ $category->slug }}</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Parentid</td>
                        <td>{{ $category->parentid }}</td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Orders</td>
                        <td>{{ $category->orders }}</td>
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>Metakey</td>
                        <td>{{ $category->metakey }}</td>
                      </tr>
                      <tr>
                        <th scope="row">6</th>
                        <td>Metadesc</td>
                        <td>{{ $category->metadesc }}</td>
                      </tr>
                      <tr>
                        <th scope="row">7</th>
                        <td>Created By</td>
                        <td>{{ $category->created_by }}</td>
                      </tr>
                      <tr>
                        <th scope="row">8</th>
                        <td>Update By</td>
                        <td>{{ $category->updated_by }}</td>
                      </tr>
                      <tr>
                        <th scope="row">9</th>
                        <td>Status</td>
                        <td>{{ $category->status }}</td>
                      </tr>
                      <tr>
                        <th scope="row">10</th>
                        <td>Created At</td>
                        <td>{{ $category->created_at }}</td>
                      </tr>
                      <tr>
                        <th scope="row">11</th>
                        <td>Update At</td>
                        <td>{{ $category->updated_at }}</td>
                      </tr>
                    </tbody>
                  </table>
            </div>
          </div>
        </div>
      </div>
      
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    
    
    <!-- partial -->
  </div>
@endsection