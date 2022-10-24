@extends('admin.index')
{{--box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;--}}
@section('content')

@if(session('success'))
<div class="row justify-content-md-center py-3">
<p class="alert alert-success text-center col-md-4">{{session ('success')}}</p>
</div>
@endif

    <div class="m-3">
        <div class="d-flex justify-content-between">
            <div class="h4" style="color:green">All Users</div>
        </div>
        <table class="table text-center  table-hover

        ">
            <thead style="color: #1D2A4D;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody style="color:#354F8E">
            @foreach($allUsers as $user)
                <tr>
                    <th scope="row">{{$user['id']}}</th>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['role']}}</td>
                    <td>
                        <div>
                            <a class="fa-solid fa-user-pen me-2" style="color:green" href="editUser/{{$user['id']}}"></a>
                            <a class="fa-solid fa-trash" style="color: red" onclick="deleteUser(this,{{$user['id']}})"></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection