@extends('admin.index')

@section('content')
    <br>
    <div class="container w-50">
        <h4>Edit Order Information</h4>
        <form action="/admin/storeEditOrder/{{$order['id']}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="user_id" class="form-label">user_id</label>
                <input type="integer" class="form-control" id="user_id" name="user_id" value="{{$order['user_id']}}">
            </div>
            <div class="mb-3">
                <label for="product_id" class="form-label">product_id</label>
                <input type="integer" class="form-control" id="product_id" name="product_id" value="{{$order['product_id']}}">
            </div>
            <div class="mb-3">
                <label for="national" class="form-label">national</label>
                <input type="text" class="form-control" id="national" name="national" value="{{$order['national']}}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">phone</label>
                <input type="integer" class="form-control" id="phone" name="phone" value="{{$order['phone']}}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{$order['address']}}">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">city</label>
                <input type="text" class="form-control" id="city" name="city" value="{{$order['city']}}">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Status</label>
                <select class="form-select" aria-label="Default select example" id="role" name="status">
                    <option value="Pending">Pending</option>
                    <option value="Approve">Approve</option>
                    <option value="Deny">Deny</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
