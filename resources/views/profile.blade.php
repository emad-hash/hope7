@extends('layout')

@section('style')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('style/profileStyle.css')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

@endsection


@section('content')

    @if(session('mssg'))
        <div class="row justify-content-md-center py-3">
            <h3 class="alert alert-success text-center col-md-4">{{session ('mssg')}}</h3>
        </div>
    @endif

    <div class="container bootstrap snippets bootdey py-5">
        <div class="row justify-content-md-center">

            <div class="profile-info col-md-11">

                <div class="panel border">
                    <div class="bio-graph-heading">
                    </div>
                    <div class="panel-body bio-graph-info" style="height: 27rem; padding-top:3rem">
                        <h1>Bio Graph</h1>

                        @foreach($User as $userinfo)

                            <div class="row">
                                <div class="biosection1 col-md-12">
                                    <div class="bio-row">
                                        <h3> Name: {{$userinfo->name}}</h3>
                                    </div>
                                    <div class="bio-row">
                                        <h3> Email: {{$userinfo->email}}</h3>
                                    </div>

                                    <div class="bio-row">
                                        <h3>Birthday: 13 July 1983</h3>
                                    </div>
                                    <div class="bio-row">
                                        <h3> Mobile: 0785631487</h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        @section('container')
            <div>
                @endsection
                @section('py')

                @endsection
                @if(session('mssg'))
                    <div class="row justify-content-md-center py-3">

                        <h3 class="alert alert-success text-center col-md-4">{{session ('mssg')}}</h3>
                    </div>
                @endif

                <div class="container bootstrap snippets bootdey py-5">
                    <div class="row justify-content-md-center">

                        <div class="profile-info col-md-11">

                            <div class="panel border">
                                <div class="bio-graph-heading">
                                </div>
                                <div class="panel-body bio-graph-info" style="height: 27rem; padding-top:3rem">
                                    <h1>Bio Graph</h1>

                                    @foreach($User as $userinfo)

                                        <div class="row">
                                            <div class="biosection1 col-md-12">
                                                <div class="bio-row">
                                                    <h3> Name: {{$userinfo->name}}</h3>
                                                </div>
                                                <div class="bio-row">
                                                    <h3> Email: {{$userinfo->email}}</h3>
                                                </div>

                                                <div class="bio-row">
                                                    <h3>Birthday: 13 July 1983</h3>
                                                </div>
                                                <div class="bio-row">
                                                    <h3> Mobile: 0785631487</h3>
                                                </div>
                                            </div>

                                            <div class="biosection1 col-md-12">
                                                @php


                                                    $user = Auth::user();
                                                @endphp

                                                <div class="bio-row">
                                                    <h3>City: Amman</h3>
                                                </div>
                                            </div>

                                            <div class="ms-4 row">

                                                <form action="{{route('logout')}}" method="POST">
                                                    @csrf

                                                    <ul class="nav nav-pills">
                                                        <li class=""><a class="btn btn-outline-info"
                                                                        href="{{route('editProfile' , $id)}}"> <i
                                                                    class="fa fa-edit"></i> Edit profile</a></li>
                                                        <li class="ms-4">
                                                            <button class="btn btn-outline-danger"
                                                                    style="color: red; height:37px; width:100px; border-radius:5px">
                                                                <i class="bi bi-box-arrow-in-left"></i> Logout
                                                            </button>
                                                        </li>
                                                        @if($user->role==='Admin')
                                                            <li class="ms-4"><a class="btn btn-outline-warning"
                                                                                href="/admin"> Admin
                                                                    Dashboard</a></li>
                                                        @endif
                                                    </ul>
                                                </form>
                                            </div>


                                            @endforeach
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-md-center">
                    <div class="col-lg-11">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3>Appointment History</h3>
                                <div class="table-responsive">
                                    <table id="mytable" class="table table-bordred table-striped">
                                        <thead class="">
                                        <th><h4>Appointment Number</h4></th>
                                        <th><h4>Date</h4></th>
                                        <th><h4>Doctor Name</h4></th>

                                        </thead>
                                        @foreach($appointments as $appointment)

                                            <tbody>

                                            <!-- Display Records -->
                                            <tr class="">
                                                <td class=""><h5>{{$appointment->id}} </h5></td>
                                                <td class=""><h5>{{$appointment->appointment_time}}</h5></td>
                                                <td class=""><h5>{{$appointment->name}}</h5></td>


                                            </tr>


                                            </tbody>
                                        @endforeach

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row justify-content-md-center">

                    <div class="col-lg-11">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3>Orders History</h3>
                                <div class="table-responsive">
                                    <table id="mytable" class="table table-bordred table-striped">
                                        <thead class="">
                                        <th><h4>Order Number</h4></th>
                                        <th><h4>Product Name</h4></th>
                                        <th><h4>status</h4></th>
                                        <th><h4>Date</h4></th>

                                        </thead>
                                        @foreach($orders as $order)

                                            <tbody>

                                            <!-- Display Records -->
                                            <tr class="">
                                                <td class=""><h5>{{$order->id}}</h5></td>
                                                <td class=""><h5>{{$order->name}}</h5></td>
                                                <td class=""><h5>{{$order->status}}</h5></td>
                                                <td class=""><h5>{{$order->created_at}}</h5></td>


                                            </tr>


                                            </tbody>
                                        @endforeach

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <ul class="nav nav-pills d-flex flex-row-reverse" style="margin-right: 5.5rem">
                    <li class=""><a class="btn btn-outline-primary " href="{{route('testimonial' , $id)}}"> Tell us
                            about your
                            experiance</a></li>

                </ul>

            </div>

@endsection
