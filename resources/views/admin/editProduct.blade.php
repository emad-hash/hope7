@extends('admin.index')

@section('content')
    <div class="container w-75">
        <h4>Edit Product</h4>
        <form action="/admin/storeEditProduct/{{$product['id']}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Product Description</label>
                <input type="text" class="form-control" id="name" name="description" value="">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Product image</label>
                <input type="file" class="form-control" id="name" name="image">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
