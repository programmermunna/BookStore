@extends('admin.layouts.template');
@section('page_title') Admin-Sub categories @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages /</span> All Sub Categories</h4>
    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">Table Basic</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Sub Category Name</th>
              <th>Parent Category</th>
              <th>Product</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @foreach ($subcategories as $subcategory)              
            <tr>
              <td>{{ $subcategory->id }}</td>
              <td>{{ $subcategory->subcategory_name }}</td>
              <td>{{ $subcategory->category_name }}</td>
              <td>{{ $subcategory->subcategory_product_count }}</td>
              <td>
                <a href="{{ route('edit_subcategory',$subcategory->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('delete_subcategory',$subcategory->id) }}" class="btn btn-warning">Delete</a>
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