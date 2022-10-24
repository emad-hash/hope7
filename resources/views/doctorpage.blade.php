@extends('layout')

@section('style')

    <link rel="stylesheet" href="{{asset('style/profileStyle.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet"/>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

@endsection

@section('content')

    @if(session('mssg'))
        <div class="row justify-content-md-center py-5">
            <h3 class="alert alert-success text-center col-md-4">{{session ('mssg')}}</h3>
        </div>
    @endif
    @foreach($doctor as $doctorinfo)

        <div class="container bootstrap snippets bootdey py-5">
            <div class="row">
                <div class="profile-nav col-md-3">
                    <div class="panel border">
                        <div class="user-heading round">
                            <a href="#">
                                <img src="data:image/jpg;charset=utf8;base64,{{$doctorinfo['image']}}"
                                     alt="">
                            </a>
                            <h1>{{$doctorinfo->name}}</h1>
                            <p>{{$doctorinfo->email}}</p>
                        </div>
                        <ul class="nav nav-pills nav-stacked">
                            <li class="w-100"><a href="{{route('editDocProfile' , $id)}}"> <i class="fa fa-edit"></i>
                                    Edit profile</a></li>
                        </ul>
                        <hr class="m-0">
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            @method('POST')


                            <input type="submit" value="Logout"
                                   style="border:none; border-radius:0px 0px 3px 3px; height:52px"
                                   class="w-100 btn btn-outline-danger">

                        </form>
                    </div>
                </div>
                <div class="profile-info  col-md-9">

                    <div class="panel border">
                        <div class="bio-graph-heading" style="height: 10.5rem;">
                        </div>
                        <div class="panel-body bio-graph-info" style="height: 25rem; padding-top:3rem">
                            <h1>Bio Graph</h1>


                            <div class="row">
                                <div class="biosection1 col-md-12">
                                    <div class="bio-row">
                                        <h3>Name: {{$doctorinfo->name}}</h3>
                                    </div>
                                    <div class="bio-row">
                                        <h3>Availalbe Time: {{$doctorinfo->available_time}}</h3>
                                    </div>
                                    <div class="bio-row">
                                        <h3>Email: {{$doctorinfo->email}}</h3>

                                    </div>
                                    <div class="bio-row">
                                        <h3> Birthday: 13 July 1983</h3>
                                    </div>
                                </div>

                                <div class="biosection1 col-md-12">

                                    <div class="bio-row">
                                        <h3> Mobile: 0785631487 </h3>
                                    </div>
                                    <div class="bio-row">
                                        <h3> Certificate: {{$doctorinfo->certificate[1]}}.jpg</h3>
                                    </div>


                                </div>

                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>


                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3>Appointment History</h3>
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead class="">
                                    <th><h4>Appointment Number</h4></th>
                                    <th><h4>Date</h4></th>
                                    <th><h4>Patient Name</h4></th>

                                    </thead>
                                    @foreach($appointmentsAndusers as $appointment)

                                        <tbody>

                                        <!-- Display Records -->
                                        <tr class="">
                                            <td class=""><h5> {{$appointment->id}}</h5></td>
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
        </div>

        @endsection
