@extends('main')
@section('content')

<form method="post" action="/product/store" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">

        <label for="category" class="form-label">Category</label>
        <select class="form-control" id="category" name="category">
            <option selected value="" disabled>Category Selection</option>
            <option value="Sportas">Sportas</option>
            <option value="Laisvalaikis">Laisvalaikis</option>
            <option value="Ekstremalus pojuciai">Ekstremalus pojuciai</option>
        </select>

    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" class="form-control" id="description" name="description">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" id="price" name="price">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
