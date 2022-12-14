@extends('layouts.admin')

@section('title','Detail list Order')

@section('maincontent')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
              <a href="{{ route('order.index') }}" class="btn btn-light">Back</a>
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
                        <td>{{ $order->id }}</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Name</td>
                        <td>{{ $order->name }}</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Category</td>
                        <td>
                          @foreach ($list_category as $category)
                          @if ($category->id == $order->catid)
                            <p value="{{ $category->id }}">{{ $category->name }}</p>
                          @endif
                        @endforeach
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">4</th>
                        <td>Supplier</td>
                        <td>
                          @foreach ($list_supplier as $supplier)
                          @if ($supplier->id == $order->suppid)
                          <p value="{{ $supplier->id }}">{{ $supplier->name }}</p>
                          @endif
                          @endforeach
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>Slug</td>
                        <td>{{ $order->slug }}</td>
                      </tr>
                      <tr>
                        <th scope="row">6</th>
                        <td>img</td>
                        <td>{{ $order->img }}</td>
                      </tr>
                      <tr>
                        <th scope="row">7</th>
                        <td>Price</td>
                        <td>{{ $order->price }}</td>
                      </tr>
                      <tr>
                        <th scope="row">8</th>
                        <td>Pricesale</td>
                        <td>{{ $order->pricesale }}</td>
                      </tr>
                      <tr>
                        <th scope="row">9</th>
                        <td>Number</td>
                        <td>{{ $order->number }}</td>
                      </tr>
                      <tr>
                        <th scope="row">10</th>
                        <td>Detail</td>
                        <td>{{ $order->detail }}</td>
                      </tr>
                      <tr>
                        <th scope="row">11</th>
                        <td>Metakey</td>
                        <td>{{ $order->metakey }}</td>
                      </tr>
                      <tr>
                        <th scope="row">12</th>
                        <td>Metadesc</td>
                        <td>{{ $order->metadesc }}</td>
                      </tr>
                      <tr>
                        <th scope="row">13</th>
                        <td>Created By</td>
                        <td>{{ $order->created_by }}</td>
                      </tr>
                      <tr>
                        <th scope="row">14</th>
                        <td>Update By</td>
                        <td>{{ $order->updated_by }}</td>
                      </tr>
                      <tr>
                        <th scope="row">15</th>
                        <td>Status</td>
                        <td>
                          @if ($order-> status == 1)
                            <p>Done update</p> 
                          @else
                            <p>Not update</p>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">16</th>
                        <td>Created At</td>
                        <td>{{ $order->created_at }}</td>
                      </tr>
                      <tr>
                        <th scope="row">17</th>
                        <td>Update At</td>
                        <td>{{ $order->updated_at }}</td>
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