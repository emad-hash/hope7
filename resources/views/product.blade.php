@extends('layout')

@section('content')

    <!-- banner -->
    <div class="heading-container heading-resize heading-button">
        <div class="heading-background heading-parallax bg-4" style="background-image:url()">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading-wrap">
                            <div class="page-title">
                                <h1></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="container-fluid py-5">
        <div class="container d-flex flex-wrap">
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
                            <a href="order/{{$product['id']}}" class="btn btn-primary rounded-pill py-3 px-5 my-2">Order
                                Now</a>
                        </div>
                    </div>
                @endif

            @endforeach


        </div>
    </div>

@endsection
