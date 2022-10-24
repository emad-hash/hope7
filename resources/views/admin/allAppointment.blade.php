@extends('admin.index')

@section('content')


<div class="d-flex justify-content-between m-3 ">
    <div class="h4" style="color: black">All Appointment</div>
</div>
<table class="table text-center table-hover">
    <thead style="color:#1D2A4D; ">
    <tr>
        <th scope="col">#</th>
        <th scope="col">Doctor Name</th>
        <th scope="col">User Name</th>
        <th scope="col">Appointment Time</th>
        <th scope="col">edit/delete</th>

        {{-- <th scope="col">Actions</th> --}}
    </tr>
    </thead>
    <tbody style="color:#354F8E">
    @foreach($usersDoctorsAppointments as $appointment)
        {{-- @php
            $user = App\Models\User::find($appointment['user_id']);
            $doctor_id=$appointment['doctor_id'];
            $doctor = App\Models\doctor::all()->where('id','=',$doctor_id);
        @endphp --}}
        <tr>
            {{-- <th scope="row"></th> --}}

            <td>{{$appointment->id}}</td>
            <td>{{$appointment->name}}</td>
            <td>{{$appointment->user_name}}</td>
            <td>{{$appointment->appointment_time}}</td>
             <td>  
                 <div>
                    <a class="fa-solid fa-user-pen me-2"  style="color:green" href="editAppointment/{{$appointment->id}}"></a>
                   <a class="fa-solid fa-trash"  style="color: red"  onclick="deleteAppointment(this,{{$appointment->id}})"></a>
                </div>
            </td>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection