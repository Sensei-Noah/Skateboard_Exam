@extends('main')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Price</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($product as $products)

        <tr>
            <th scope="row">{{ $products->id }}</th>
            <td>{{ $products->name }}</td>
            <td>{{ $products->category }}</td>
            <td>{{ $products->price }}</td>
        </tr>
        @endforeach

    </tbody>
  </table>
@endsection
