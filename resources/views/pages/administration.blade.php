@extends('main')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Category</th>
        <th scope="col">Price</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($product as $products)

        <tr>
            <th scope="row">{{ $products->id }}</th>
            <td>{{ $products->name }}</td>
            <td>{{ $products->category }}</td>
            <td>{{ $products->price }}</td>
            <td>
                @if (Auth::check() && Auth::id() == $products->user_id)
                    <a type="button" class="btn btn-primary mt-2"
                        href="/product/edit/{{ $products->id }}">Edit</a>
                    <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal"
                        data-bs-target="#deleteConformation">Delete</button>
                @else
                    <a type="button" class="btn btn-primary mt-2" href="/login">Login</a>
                @endif
            </td>
        </tr>
        @endforeach

    </tbody>
  </table>

  <div class="modal fade" id="deleteConformation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="/product/delete/{{ $products->id ?? '' }}" class="btn btn-danger">Confirm delete</a>
            </div>
        </div>
    </div>
</div>
@endsection
