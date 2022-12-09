@extends('main')
@section('content')
    <div class="container">
        <label for="title"> {{ $product->category }}</label>
        <h1 class="mt-4" id="title">{{ $product->name }}</h1>
        <p>{{ $product-> description }}</p>
        <p class="">{{ $product->price }}$</p>
        <hr class="my-4" />
        <div class="row">
            <img class="img-thumbnail img-fluid" style="" src="/storage/{{ $product-> image }}">
        </div>
    </div>

@endsection
