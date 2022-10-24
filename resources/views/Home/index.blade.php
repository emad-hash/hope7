@extends('layout')

@section('content')
    <!-- Hero Start -->
    <section>
        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-start">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5"
                            style="border-color: rgba(256, 256, 256, .3) !important;">Welcome To Hands OF Hope</h5>
                        <h1 class="display-1 text-white mb-md-4">Best Healthcare Solution In Your City</h1>
                        <div class="pt-2">
                            {{-- <a href="" class="btn btn-light rounded-pill py-md-3 px-md-5 mx-2">Find Doctor</a> --}}
                            <a href=""
                               class="btn btn-outline-info rounded-pill py-md-3 px-md-5 mx-2"
                               style="background-color:turquoise; color:white;">Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero End -->
    {{-- Services Start --}}
    <section>
        <div class="container-fluid py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Services</h5>
                    <h1 class="display-4">Excellent Medical Services</h1>
                </div>
                <div class="row g-5">
                    @foreach($Department as $department)
                        <div class="col-lg-4 col-md-6">
                            <div
                                class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="service-icon mb-4">
                                    <i class="fa fa-2x fa-user-md text-white"></i>
                                </div>
                                <h4 class="mb-3">{{$department['name']}}</h4>

                                <p class="m-0">{{$department['description']}}</p>
                                <a class="btn btn-lg btn-primary rounded-pill"
                                   href='/appointment/{{$department['id']}}'>

                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    {{-- Services Section End --}}
    <!-- product  Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Medical Packages</h5>
                <h1 class="display-4">Medical Products</h1>
            </div>
            <div class="owl-carousel price-carousel position-relative" style="padding: 0 45px 45px 45px;">
                @foreach ($products as $product)
                    @if($product->quantity>0)
                        <div class="bg-light rounded text-center m-3">
                            <div class="position-relative">
                                <img class="img-fluid rounded-top"
                                     src="data:image/jpg;charset=utf8;base64,{{$product['image']}}" alt="0000000">

                            </div>
                            <div class="text-center py-5 m-5">
                                <h3>{{$product['name']}}</h3>
                                <p>{{$product['description']}}</p>
                                <a href="order/{{$product['id']}}" class="btn btn-primary rounded-pill py-3 px-5 my-2">Apply
                                    Now</a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Our Doctors</h5>
                <h1 class="display-4">Qualified Healthcare Professionals</h1>
            </div>
            <div class="owl-carousel team-carousel position-relative">
                <div class="owl-dots disabled"></div>
                @foreach($doctors as $doctor)
                    <div class="team-item">
                        <div class="row g-0 bg-light rounded overflow-hidden">
                            <div class="col-12 col-sm-5 h-100">
                                <img class="img-fluid h-100"
                                     src="data:image/jpg;charset=utf8;base64,{{$doctor['image']}}"
                                     style="object-fit: cover;">
                            </div>
                            <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                                <div class="mt-auto p-4">
                                    <h3>{{$doctor['name']}}</h3>
                                    <h6 class="fw-normal fst-italic text-primary mb-4">{{$doctor['name']}}</h6>
                                    <p class="m-0">{{$doctor['overview']}}</p>
                                </div>
                                <div class="d-flex mt-auto border-top p-4">
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3"
                                       href="www.twitter.com"><i
                                            class="fab fa-twitter"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3"
                                       href="www.facebook.com"><i
                                            class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded-circle"
                                       href="www.linkedin.com"><i
                                            class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <!-- Team End -->




    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Testimonial</h5>
                <h1 class="display-4">Patients Say About Our Services</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                        @foreach($testimonials as $testimonial)
                            <div class="testimonial-item text-center">
                                <div class="position-relative mb-5">
                                    <img class="img-fluid rounded-circle mx-auto" style="visibility
                                : hidden" src="img/testimonial-2.jpg" alt="">

                                    <div
                                        class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                        style="width: 60px; height: 60px;">
                                        <i class="fa fa-quote-left fa-2x text-primary"></i>
                                    </div>
                                </div>
                                <p class="fs-4 fw-normal">{{$testimonial['message']}}</p>
                                <hr class="w-25 mx-auto">
                                <h3>{{$testimonial['name']}}</h3>
                                <h6 class="fw-normal text-primary mb-3">{{$testimonial['subject']}}</h6>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial End -->

@endsection
