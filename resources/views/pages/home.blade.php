@extends('main')

@section('content')

<h1 class="bg-danger">Home</h1>
<div class="d-flex gap-5 flex-wrap">

    @foreach ($product as $products)

    <div class="card" style="width: 18rem;">
        <img src="/storage/{{ $products->image }}" class="card-img-top" alt="product image">
        <div class="card-body">
            <label for="title">{{ $products->category }}</label>
            <h5 class="card-title" id="title">{{ $products->name }}</h5>
            <p class="card-text">{{ $products->description }}</p>
            <p class="">{{ $products->price }}$</p>
            <a href="/product/show/{{ $products->id }}" class="btn btn-primary">Check product</a>
        </div>
    </div>

    @endforeach
    <div class="d-flex justify-content-end md-4 pt-2">
        {{ $product->links() }}
    </div>
</div>

@endsection
