<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\doctor;
use App\Models\appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function appointmentPage($id)
    {

        $availableForDepartment = doctor::where('department_id', $id)->get();
        return view('appointment', ['id' => $id, 'availableForDepartment' => $availableForDepartment]);
    }

    public function appointmentStore(Request $request, $id)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $appointment = new appointment();



        $email = request('email');
        $user = User::where('email', $email)->get();
        $user_id = $user[0]->id;


        $appointment->user_id = $user_id;
        $time = explode(',', request('time'));
        $appointment->appointment_time = $time[0];

        // select random_int ((select all from doctors where department_id= $id and available_time =$appointment->appointment_time)) then push id number foreeach inside array then select random number from an array
        // $availableDoctors = doctor::where([
        //     ['department_id', "$id"],
        //     ['available_time', "$appointment->appointment_time"],
        // ])->get();

        // $ArrayofIDs=[];

        // foreach ($availableDoctors as $doctor)
        // {
        //     array_push($ArrayofIDs, $doctor->id);

        // }

        // $rand_id = array_rand($ArrayofIDs, 1);
        // $rand_id++;


        $appointment->doctor_id = $time[1];
        $appointment->save();

        return redirect("/")->with('mssg', 'Your appointment has been booked successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
