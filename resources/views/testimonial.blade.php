@extends('layout')

@section('content')

    <div class="container-fluid pt-5">
        <div class="container">

            <div class="row justify-content-center position-relative mt-1" style="margin-top: -200px; z-index: 1;">
                <div class="col-lg-8">
                    <div class="bg-white rounded p-5 m-5 mb-0">
                        <h2 class="text-center mb-5">Your Opanion Matters</h2>
                        <form action="{{route('testimonialpost' , $id)}}" method="POST">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @foreach ($User as $userinfo)
                                <div class="row g-3">
                                    <div class="col-12">
                                        <input type="text" class="form-control bg-light border-0"
                                               value="{{$userinfo->name}}" name="name" placeholder="Your Name"
                                               style="height: 55px;">
                                    </div>
                                    <div class="col-12">
                                        <input type="email" class="form-control bg-light border-0"
                                               value="{{$userinfo->email}}" name="email" placeholder="Your Email"
                                               style="height: 55px;">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" class="form-control bg-light border-0" name="subject"
                                               placeholder="Subject" style="height: 55px;">
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control bg-light border-0" rows="5" name="message"
                                                  placeholder="Message"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Send</button>
                                    </div>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
