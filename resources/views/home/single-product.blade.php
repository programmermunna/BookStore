@extends('home.layouts.template')
@section('page_title') Eflyer-Single Product @endsection
@section('content')
<div class="container">
    <h1>Product Details</h1>
    <div class="row p-5">
      <div class="col-md-6">
        <img src="{{ asset($product->product_img) }}" alt="Product Image">
      </div>
      <div class="col-md-6">
        <h2>{{ $product->product_name }}</h2>
        <p>{{ $product->product_short_des }}</p>
        <p>$19.99</p>
        <button class="btn btn-primary">Add to Cart</button>
      </div>
    </div>

    <div class="card mb-5">{{ $product->product_long_des }}</div>
</div>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>







@endsection
 