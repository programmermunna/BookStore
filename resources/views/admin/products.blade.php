@extends('admin.layouts.template');
@section('page_title') Admin-All Products @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages /</span> All Products</h4>
    <!-- Basic Bootstrap Table -->
    <div class="card">
      <div class="d-flex justify-content-between">
        <h5 class="card-header">Table Basic</h5>
        <h5 class="card-header">
          @if(session()->has('message'))
              <div class="alert alert-success">
                {{ session()->get('message') }}
              </div>
            @endif
        </h5>
      </div>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Image</th>
              <th>Products Name</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Category</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($products as $product)              
            <tr>
              <td>{{ $product->id }}</td>
              <td>
                <img style="height:100px" src="{{ asset($product->product_img) }}" alt="">
              </td>
              <td>{{ $product->product_name }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->quantity }}</td>
              <td>{{ $product->product_category_name }}</td>
              <td>
                <a href="{{ route('edit_product',$product->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('delete_product',$product->id) }}" class="btn btn-warning">Delete</a>
              </td>
            </tr>            
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Basic Bootstrap Table -->
  </div>
@endsection