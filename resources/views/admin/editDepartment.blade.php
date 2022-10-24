@extends('admin.index')

@section('content')
    <div class="container w-75">
        <h4>Edit Department</h4>
        <form action="/admin/storeEditDepartment/{{$Department['id']}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Department Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$Department['name']}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Department Description</label>
                <input type="text" class="form-control" id="name" name="description" value="{{$Department['description']}}">
            </div>
            
            <div class="mb-3">
                <label for="Members" class="form-label">Members</label>
                <input type="number" class="form-control" id="Members" name="Members" value="{{$Department['numberOfMembers']}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
