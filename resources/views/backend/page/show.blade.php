@extends('layouts.admin')

@section('title','Detail list Page')

@section('maincontent')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
              <a href="{{ route('page.index') }}" class="btn btn-light">Back</a>
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
                        <th scope="row">1</th>
                        <td>ID</td>
                        <td>{{ $page->id }}</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Name</td>
                        <td>{{ $page->title }}</td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Slug</td>
                        <td>{{ $page->slug }}</td>
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>Detail</td>
                        <td>{{ $page->detail }}</td>
                      </tr>
                      <tr>
                        <th scope="row">6</th>
                        <td>img</td>
                        <td><img src="{{ asset('images/pages/'. $page->img) }}" class="img-fluid" alt="Image"></td>
                      </tr>
                      <tr>
                        <th scope="row">7</th>
                        <td>page type</td>
                        <td>{{ $page->pagetype }}</td>
                      </tr>

                      <tr>
                        <th scope="row">8</th>
                        <td>Metakey</td>
                        <td>{{ $page->metakey }}</td>
                      </tr>
                      <tr>
                        <th scope="row">9</th>
                        <td>Metadesc</td>
                        <td>{{ $page->metadesc }}</td>
                      </tr>
                      <tr>
                        <th scope="row">10</th>
                        <td>Created By</td>
                        <td>{{ $page->created_by }}</td>
                      </tr>
                      <tr>
                        <th scope="row">11</th>
                        <td>Update By</td>
                        <td>{{ $page->updated_by }}</td>
                      </tr>
                      <tr>
                        <th scope="row">12</th>
                        <td>Status</td>
                        <td>
                          @if ($page-> status == 1)
                            <p>Done update</p> 
                          @else
                            <p>Not update</p>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">13</th>
                        <td>Created At</td>
                        <td>{{ $page->created_at }}</td>
                      </tr>
                      <tr>
                        <th scope="row">14</th>
                        <td>Update At</td>
                        <td>{{ $page->updated_at }}</td>
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