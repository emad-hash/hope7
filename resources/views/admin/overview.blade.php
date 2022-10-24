@extends('admin.index')






@section('content')
    <br>
    <!-- Button trigger modal -->

    <!-- Modal -->
<div class="container">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Number of Users</h6>
                    <h2 class="text-right"><span>{{$NumallUsers}}</span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Number of Doctors</h6>
                    <h2 class="text-right"><span>{{$NumallDoctors}}</span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Number of all Orders</h6>
                    <h2 class="text-right"><span>{{$NumallOrders}}</span></h2>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Number of Appointments</h6>
                    <h2 class="text-right"><span>{{$NumallAppointments}}</span></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Number of Products</h6>
                    <h2 class="text-right"><span>{{$NumallProducts}}</span></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Number of Departments</h6>
                    <h2 class="text-right"><span>{{$NumallDepartments}}</span></h2>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Donations</h6>
                    <h2 class="text-right"><span>{{$donationAmount}}</span></h2>
                </div>
            </div>
        </div>
	</div>

            

</div>

@endsection
