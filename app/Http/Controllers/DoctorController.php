<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Storage;


class DoctorController extends Controller
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


    public function showdoctorpage($id)
    {
        $doctor = doctor::where('id', $id)->get();
        // dd($doctor[0]->certificate);
        $appointmentsAndusers = DB::table('users')->join('appointment', 'appointment.user_id', '=', 'users.id')->where('appointment.doctor_id', $id)->get();

        return view('doctorpage', ['id' => $id, 'doctor' => $doctor, 'appointmentsAndusers' => $appointmentsAndusers]);
    }

    public function editdoctorinfo($id)
    {
        $doctor = doctor::where('id', $id)->get();
        return view('editDocProfile', ['id' => $id, 'doctor' => $doctor]);
    }

    public function updateDoctorProfile(Request $request, $id)
    {



        $request->validate([
            'Name' => ['required', 'string', 'max:255'],
            'Email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'Available' => ['required'],
            'Password' => ['required'],


        ]);
        if ($request->file('Personal') && $request->file('Certificate')) {


            $image = base64_encode(file_get_contents($request->file('Personal')));
            $Certificate = base64_encode(file_get_contents($request->file('Certificate')));

            doctor::where('id', $id)->update(['name' => request('Name'), 'email' => request('Email'), 'password' => Hash::make($request->password), 'available_time' => request('Available'), 'image' => $image, 'certificate' => $Certificate]);

            return redirect("/doctorprofile/$id")->with('mssg', 'Personal information updated successfully');

         }elseif ($request->file('Personal')) {

            $image = base64_encode(file_get_contents($request->file('Personal')));


            doctor::where('id', $id)->update(['name' => request('Name'), 'email' => request('Email'), 'password' => Hash::make($request->password), 'available_time' => request('Available'), 'image' => $image]);

            return redirect("/doctorprofile/$id")->with('mssg', 'Personal information updated successfully');
        } elseif ($request->file('Certificate')) {

            $Certificate = base64_encode(file_get_contents($request->file('Certificate')));



            doctor::where('id', $id)->update(['name' => request('Name'), 'email' => request('Email'), 'password' => Hash::make($request->password), 'available_time' => request('Available'), 'certificate' => $Certificate]);

            return redirect("/doctorprofile/$id")->with('mssg', 'Personal information updated successfully');
        }
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
