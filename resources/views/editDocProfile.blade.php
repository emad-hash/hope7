@extends('layout')

@section('style')

    <link rel="stylesheet" href="{{asset('style/profileStyle.css')}}">

@endsection

@section('content')

    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">

                <div class="container">
                    <div class="row row justify-content-md-center">
                        <div class="col-6 col-md-4">
                            <h2 class="text-center">Edit form</h2>


                            <form action="{{route('updateDoctorProfile' , $id)}}" method="POST"
                                  enctype="multipart/form-data">

                                @csrf
                                @method('PUT')
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @foreach ($doctor as $doctorinfo)
                                    <div class="mb-3">
                                        <label for="Name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="Name" name="Name"
                                               value="{{$doctorinfo->name}}" aria-describedby="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input type="email" class="form-control" name="Email" id="exampleInputEmail1"
                                               value="{{$doctorinfo->email}}" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Password" class="form-label">Password</label>
                                        <input type="Password" class="form-control" name="Password" id="Password"
                                               value="{{$doctorinfo->password}}" aria-describedby="Password">
                                    </div>

                                    <div class="mb-3">
                                        <label class="mb-2" for="available">Select Availability</label>
                                        <input type="date" class="form-control" name="Available" id="available"
                                               value="{{$doctorinfo->available_time}}" aria-describedby="Password">

                                    </div>

                                    <div class="mb-3">
                                        <label for="Certificate" class="form-label">Certificate</label>
                                        <input type="file" class="form-control" id="Certificate" name="Certificate"
                                               value="{{$doctorinfo->certificate}}" aria-describedby="">
                                    </div>

                                    <div class="mb-3">
                                        <label for="Personal" class="form-label">Personal Photo</label>
                                        <input type="file" class="form-control" id="Personal" name="Personal"
                                               value="{{$doctorinfo->image}}" aria-describedby="">
                                    </div>



                                    <button type="submit" class="btn btn-primary">Submit</button>
                                @endforeach
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
