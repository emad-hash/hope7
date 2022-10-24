@extends('layout')
@section('content')
    {{-- Create Appointment Section --}}
    <section>
        <div class="container py-5">
            <div class="row gx-5">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h5 class="d-inline-block text-primary  text-uppercase border-bottom border-5">Appointment</h5>

                    <div class="mb-4">
                        <h1 class="display-4">Make An Appointment For Your Family</h1>
                    </div>
                    <p class=" mb-5"><b> 1- Free Health Centers can be found by clicking here to.
                            <br> 2- NeedyMeds has a database of free clinics.
                            <br> 3- Your local pharmacist may have a clinic that provides visits.
                            <br> 4- There may be charitable health care providers or hospitals in your area that provide
                            free health services.</b></p>
                    <a class="btn btn-outline-dark rounded-pill py-3 px-5" href="/about">Read More</a>
                </div>
                <div class="col-lg-6">
                    <div class="bg-white text-center rounded p-5">
                        <h1 class="mb-4">Book An Appointment</h1>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('appointmentStore', $id)}}" method="POST" id="submitBtn">

                            @csrf
                            @php

                                $user = Auth::user();
                            @endphp
                            <div class="row g-3">
                                <div class="col-12 col-sm-12">
                                    <label class="mb-2" for="Availability"> Select Date</label>
                                    <select class="form-select bg-light border-0" id="Availability" name="time"
                                            style="height: 55px;">

                                        @foreach($availableForDepartment as $availability)

                                            <option
                                                value="{{$availability->available_time}},{{$availability->id}}">{{$availability->name}}
                                                /{{$availability->available_time}}</option>

                                        @endforeach

                                    </select>
                                </div>


                                <div class="col-12 col-sm-12">
                                    <input type="text" class="form-control bg-light border-0" value="{{$user['name']}}"
                                           name="name" placeholder="Your Name"
                                           style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-light border-0"
                                           value="{{$user['email']}}" name="email" hidden placeholder="Your Email"
                                           style="height: 55px;">
                                </div>

                            </div>
                            <div class="col-12 mt-3">
                                <button class="btn btn-primary w-100 py-3" type="submit" onclick="event.preventDefault()
                                    Swal.fire({
                                          position: 'top-center',
                                          icon: 'success',
                                          title: 'Your work has been saved',
                                          showConfirmButton: false,
                                          timer: 1500
                                        })
                                        let form = document.getElementById('submitBtn')
                                        setTimeout(function() {
                                            form.submit()
                                        },1600)
                                    ">Make An
                                    Appointment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- End Appointment Section --}}
@endsection
