@extends('admin.layouts.template');
@section('page_title') Admin-All Products @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages /</span> All Products</h4>
    <!-- Basic Bootstrap Table -->
    <div class="card">
      <h5 class="card-header">Table Basic</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Products Name</th>
              <th>Image</th>
              <th>Price</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <tr>
              <td>1</td>
              <td>Electronics</td>
              <td>20</td>
              <td>10</td>
              <td>
                <a href="" class="btn btn-primary">Edit</a>
                <a href="" class="btn btn-warning">Delete</a>
              </td>
            </tr>            
          </tbody>
        </table>
      </div>
    </div>
    <!--/ Basic Bootstrap Table -->
  </div>
@endsection