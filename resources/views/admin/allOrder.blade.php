@extends('admin.index')
{{--box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;--}}
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-xl-4">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total number of Orders</h6>
                    <p class="m-b-0"><span class="f-right">{{count($allOrders)}} Orders</span></p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-4">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Approved Orders</h6>
                    <p class="m-b-0"> <span class="f-right">{{count($approved)}} Orders</span></p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-4">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Pending Orders</h6>
                    <p class="m-b-0"><span class="f-right">{{count($pending)}} Orders</span></p>
                </div>
            </div>
        </div>
    </div>
</div>

    <br>

    <table class="table text-center table-hover">
        <thead style="color:#1D2A4D;">
        <tr>
            <th scope="col">#</th>
            <th scope="col">user_id</th>
            <th scope="col">product_id</th>
            <th scope="col">national</th>
            <th scope="col">phone</th>
            <th scope="col">address</th>
            <th scope="col">city</th>
            <th scope="col">status</th>
            <th scope="col">Actions</th>

        </tr>
        </thead>
        <tbody style="color:#354F8E">
        @foreach($allOrders as $order)
            <tr>
                <th scope="row">{{$order['id']}}</th>
                <td>{{$order['user_id']}}</td>
                <td>{{$order['product_id']}}</td>
                <td>{{$order['national']}}</td>
                <td>{{$order['phone']}}</td>
                <td>{{$order['address']}}</td>
                <td>{{$order['city']}}</td>
                <td>{{$order['status']}}</td>
                <td>
                    <div>
                        <a class="fa-solid fa-user-pen me-2" style="color:green" href="editOrder/{{$order['id']}}"></a>
                        <a class="fa-solid fa-trash" style="color: red" onclick="deleteOrder(this,{{$order['id']}})"></a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


        {{--        <br>--}}
        {{--        <div class="d-flex justify-content-between">--}}
        {{--            <div class="h4">All Product</div>--}}
        {{--            <a class="btn" href="">View All</a>--}}
        {{--        </div>--}}
        {{--        <table class="table">--}}
        {{--            <thead>--}}
        {{--            <tr>--}}
        {{--                <th scope="col">#</th>--}}
        {{--                <th scope="col">First</th>--}}
        {{--                <th scope="col">Last</th>--}}
        {{--                <th scope="col">Handle</th>--}}
        {{--            </tr>--}}
        {{--            </thead>--}}
        {{--            <tbody>--}}
        {{--            <tr>--}}
        {{--                <th scope="row">1</th>--}}
        {{--                <td>Mark</td>--}}
        {{--                <td>Otto</td>--}}
        {{--                <td>@mdo</td>--}}
        {{--            </tr>--}}
        {{--            <tr>--}}
        {{--                <th scope="row">2</th>--}}
        {{--                <td>Jacob</td>--}}
        {{--                <td>Thornton</td>--}}
        {{--                <td>@fat</td>--}}
        {{--            </tr>--}}
        {{--            <tr>--}}
        {{--                <th scope="row">3</th>--}}
        {{--                <td colspan="2">Larry the Bird</td>--}}
        {{--                <td>@twitter</td>--}}
        {{--            </tr>--}}
        {{--            </tbody>--}}
        {{--        </table>--}}

        <!-- Modal -->

    </div>

@endsection
