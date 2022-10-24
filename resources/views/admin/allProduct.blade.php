@extends('admin.index')
{{--box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;--}}
@section('content')

    {{-- add Product Model --}}


    <!-- Signup Modal -->



    <form name="regForm" id="signUpForm" action="/admin/addProduct" enctype="multipart/form-data" method="POST">

        @csrf

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Add New Product</h3>
                        <hr>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" id="name" placeholder="name">
                            <label for="name">Product Name</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="description" id="description"
                                   placeholder="description...">
                            <label for="description">Description</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="quantity" id="quantity"
                                   placeholder="quantity">
                            <label for="quantity">Quantity</label>
                        </div>

                        <div class="form mb-3">
                            <label for="image">Product Image</label>
                            <input type="file" class="form-control" name="image" id="image" placeholder="image">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" name="signupformbtnname" style="border-radius: 5px; padding:5px;"
                               id="Signupformbtn" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </div>

    </form>


    {{-- model end here --}}

    <div class="d-flex justify-content-between m-3">
        <div class="h4">All Products</div>
        <button type="button" class="btn btn-primary m-1 w-25 rounded-pill " data-bs-toggle="modal"
                data-bs-target="#exampleModal">Add New Product
        </button>
    </div>
    <table class="table text-center table-hover ">
        <thead style="color:#1D2A4D; ">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">description</th>
            <th scope="col">quantity</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody style="color:#354F8E">
        @foreach($allProduct as $product)
            <tr>
                <th scope="row">{{$product['id']}}</th>
                <td>{{$product['name']}}</td>
                <td><img src="data:image/png;base64,{{$product['image']}}" alt="" style="width: 50px"></td>
                <td>{{$product['description']}}</td>
                <td>{{$product['quantity']}}</td>
                <td>
                    <div>
                        <a class="fa-solid fa-user-pen me-2" style="color:green"
                           href="editProduct/{{$product['id']}}"></a>
                        <a class="fa-solid fa-trash" style="color: red"
                           onclick="deleteProduct(this,{{$product['id']}})"></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
