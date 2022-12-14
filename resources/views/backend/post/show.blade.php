@extends('layouts.admin')

@section('title','Detail list Post')

@section('maincontent')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
              <a href="{{ route('post.index') }}" class="btn btn-light">Back</a>
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
                        <td>{{ $post->id }}</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Category</td>
                        <td>
                          @foreach ($list_topic as $topic)
                          @if ($topic->id == $post->topid)
                            <p value="{{ $topic->id }}">{{ $topic->name }}</p>
                          @endif
                        @endforeach
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Name</td>
                        <td>{{ $post->title }}</td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Slug</td>
                        <td>{{ $post->slug }}</td>
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>Detail</td>
                        <td>{{ $post->detail }}</td>
                      </tr>
                      <tr>
                        <th scope="row">6</th>
                        <td>img</td>
                        <td><img src="{{ asset('images/posts/'. $post->img) }}" class="img-fluid" alt="Image"></td>
                      </tr>
                      <tr>
                        <th scope="row">7</th>
                        <td>Post type</td>
                        <td>{{ $post->posttype }}</td>
                      </tr>

                      <tr>
                        <th scope="row">8</th>
                        <td>Metakey</td>
                        <td>{{ $post->metakey }}</td>
                      </tr>
                      <tr>
                        <th scope="row">9</th>
                        <td>Metadesc</td>
                        <td>{{ $post->metadesc }}</td>
                      </tr>
                      <tr>
                        <th scope="row">10</th>
                        <td>Created By</td>
                        <td>{{ $post->created_by }}</td>
                      </tr>
                      <tr>
                        <th scope="row">11</th>
                        <td>Update By</td>
                        <td>{{ $post->updated_by }}</td>
                      </tr>
                      <tr>
                        <th scope="row">12</th>
                        <td>Status</td>
                        <td>
                          @if ($post-> status == 1)
                            <p>Done update</p> 
                          @else
                            <p>Not update</p>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">13</th>
                        <td>Created At</td>
                        <td>{{ $post->created_at }}</td>
                      </tr>
                      <tr>
                        <th scope="row">14</th>
                        <td>Update At</td>
                        <td>{{ $post->updated_at }}</td>
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