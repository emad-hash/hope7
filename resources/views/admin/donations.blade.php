@extends('admin.index')

@section('content')


<div class="d-flex justify-content-between m-3">
    <div class="h4" style="color: black">All Donations</div>
</div>
<table class="table text-center table-hover">
    <thead style="color:#1D2A4D; ">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Doner Name</th>
        <th scope="col">Donation Date</th>
        <th scope="col">Donation Amount</th>

    </tr>
    </thead>
    <tbody style="color:#354F8E">
    @foreach($donations as $donation)
        
        <tr>

            <td>{{$donation->id}}</td>
            <td>{{$donation->cardholderName}}</td>
            <td>{{$donation->created_at}}</td>
            <td>{{$donation->donationAmount}}</td>
                 {{-- <div>
                    <a class="fa-solid fa-user-pen me-2"  style="color:green" href="editAppointment/{{$donation->id}}"></a>
                   <a class="fa-solid fa-trash"  style="color: red"  onclick="deleteAppointment(this,{{$donation->id}})"></a>
                </div> --}}
        </tr>
    @endforeach
    </tbody>
</table>
@endsection