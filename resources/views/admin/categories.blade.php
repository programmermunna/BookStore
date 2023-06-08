@extends('admin.layouts.template');
@section('page_title') Admin-All Categories @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages /</span> All Categories</h4>
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
              <th>Category Name</th>
              <th>Sub Category</th>
              <th>Product</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach($categories as $category)
            <tr>
              <td>{{$category->id}}</td>
              <td>{{$category->category_name}}</td>
              <td>{{$category->sub_category_count}}</td>
              <td>{{$category->product_count}}</td>
              <td>
                <a href="{{ route('editcategory',$category->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('deletecategory',$category->id) }}" class="btn btn-warning">Delete</a>
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