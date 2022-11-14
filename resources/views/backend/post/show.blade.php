@extends('layouts.admin')

@section('title','Detail list Product')

@section('maincontent')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
              <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
              <a href="{{ route('product.index') }}" class="btn btn-light">Back</a>
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
                        <td>{{ $product->id }}</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Name</td>
                        <td>{{ $product->name }}</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Category</td>
                        <td>
                          @foreach ($list_category as $category)
                          @if ($category->id == $product->catid)
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
                          @if ($supplier->id == $product->suppid)
                          <p value="{{ $supplier->id }}">{{ $supplier->name }}</p>
                          @endif
                          @endforeach
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">5</th>
                        <td>Slug</td>
                        <td>{{ $product->slug }}</td>
                      </tr>
                      <tr>
                        <th scope="row">6</th>
                        <td>img</td>
                        <td>{{ $product->img }}</td>
                      </tr>
                      <tr>
                        <th scope="row">7</th>
                        <td>Price</td>
                        <td>{{ $product->price }}</td>
                      </tr>
                      <tr>
                        <th scope="row">8</th>
                        <td>Pricesale</td>
                        <td>{{ $product->pricesale }}</td>
                      </tr>
                      <tr>
                        <th scope="row">9</th>
                        <td>Number</td>
                        <td>{{ $product->number }}</td>
                      </tr>
                      <tr>
                        <th scope="row">10</th>
                        <td>Detail</td>
                        <td>{{ $product->detail }}</td>
                      </tr>
                      <tr>
                        <th scope="row">11</th>
                        <td>Metakey</td>
                        <td>{{ $product->metakey }}</td>
                      </tr>
                      <tr>
                        <th scope="row">12</th>
                        <td>Metadesc</td>
                        <td>{{ $product->metadesc }}</td>
                      </tr>
                      <tr>
                        <th scope="row">13</th>
                        <td>Created By</td>
                        <td>{{ $product->created_by }}</td>
                      </tr>
                      <tr>
                        <th scope="row">14</th>
                        <td>Update By</td>
                        <td>{{ $product->updated_by }}</td>
                      </tr>
                      <tr>
                        <th scope="row">15</th>
                        <td>Status</td>
                        <td>
                          @if ($product-> status == 1)
                            <p>Done update</p> 
                          @else
                            <p>Not update</p>
                          @endif
                        </td>
                      </tr>
                      <tr>
                        <th scope="row">16</th>
                        <td>Created At</td>
                        <td>{{ $product->created_at }}</td>
                      </tr>
                      <tr>
                        <th scope="row">17</th>
                        <td>Update At</td>
                        <td>{{ $product->updated_at }}</td>
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