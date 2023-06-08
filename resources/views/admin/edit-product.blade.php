@extends('admin.layouts.template');
@section('page_title') Admin-Edit Product @endsection
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pages/</span> Edit Product</h4>
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
      <!-- Basic Layout -->
      <div class="col-xxl">
        <div class="card mb-4">
          @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
          @endif
          @if(session()->has('message'))
              <div class="alert alert-success">
                {{ session()->get('message') }}
              </div>
            @endif
          <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Product</h5>
            <small class="text-muted float-end">Default label</small>
          </div>
          <div class="card-body">
            <form action="{{ route('update_product') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="product_id" value="{{ $product->id }}">
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                <div class="col-sm-10">
                  <input name="product_name" type="text" class="form-control" id="basic-default-name" placeholder="Ex: Magic book" value="{{ $product->product_name }}"/>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Price</label>
                <div class="col-sm-10">
                  <input name="price" type="number" class="form-control" id="basic-default-name" placeholder="Ex: 500"  value="{{ $product->price }}"/>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Quantity</label>
                <div class="col-sm-10">
                  <input name="quantity" type="number" class="form-control" id="basic-default-name" placeholder="Ex: 5000"  value="{{ $product->quantity }}"/>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Short Description</label>
                <div class="col-sm-10">
                    <textarea name="product_short_des" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $product->product_short_des }}</textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Long Description</label>
                <div class="col-sm-10">
                    <textarea name="product_long_des" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $product->product_long_des }}</textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Category</label>
                <div class="col-sm-10">
                    <select name="product_category_id" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                      <option selected value="{{ $product->product_category_id }}">{{ $product->product_category_name }}</option>
                      @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                      @endforeach
                      </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Select Sub Category</label>
                <div class="col-sm-10">
                    <select name="product_subcategory_id" class="form-select" id="exampleFormControlSelect1" aria-label="Default select example">
                      <option selected value="{{ $product->product_subcategory_id }}">{{ $product->product_subcategory_name }}</option>
                      @foreach ($subcategories as $subcategory)
                      <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>                        
                      @endforeach
                      </select>
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Image</label>
                <div class="col-sm-10">
                    <input name="img" class="form-control" type="file" id="formFile" />
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection