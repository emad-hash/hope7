<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\doctor;
use App\Models\product;
use App\Models\Donation;
use App\Models\appointment;
use App\Models\departments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $NumallUsers = count(User::all());
        $NumallDoctors = count(doctor::all());
        $NumallOrders = count(Order::all());
        $NumallAppointments = count(appointment::all());
        $NumallProducts = count(product::all());
        $NumallDepartments = count(departments::all());
        $sum = Donation::sum('donationAmount');



        return view('admin.overview', ['NumallUsers' => $NumallUsers, 'NumallDoctors' => $NumallDoctors, 'NumallOrders' => $NumallOrders, 'NumallAppointments' => $NumallAppointments, 'NumallProducts' => $NumallProducts , 'NumallDepartments'=>$NumallDepartments , 'donationAmount' => $sum]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function allDoctor()
    {

        $allDoctors = doctor::all();
        $approved = doctor::all('status')->where('status', '=', 'Approve');
        $pending = doctor::all('status')->where('status', '=', 'pendding');
        return view('admin.allDoctor', ['allDoctors' => $allDoctors, 'approved' => $approved, 'pending' => $pending]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function allProduct()
    {
        //TODO get All product From table
        $allProduct = product::all();
        return view('admin.allProduct', ['allProduct' => $allProduct]);
    }

    public function allAppointment()
    {


        $usersDoctorsAppointments = DB::table('users')
            ->join('appointment', 'users.id', '=', 'appointment.user_id')
            ->join('doctors', 'doctors.id', '=', 'appointment.doctor_id')
            ->select('users.*', 'doctors.*', 'appointment.*')
            ->get();




        $names = DB::table('users')
            ->join('appointment', 'users.id', '=', 'appointment.user_id')
            ->join('doctors', 'doctors.id', '=', 'appointment.doctor_id')
            ->select('users.*', 'appointment.*')
            ->get();



        foreach ($names as $name) {

            $name->user_name = $name->name;
        }


        $counter = 0;
        foreach ($usersDoctorsAppointments as $usr) {
            for ($i = $counter; $i < count($names); $i++) {

                $usr->user_name = $names[$i]->user_name;
                $counter++;

                break;
            }
        }



        return view('admin.allAppointment', ['usersDoctorsAppointments' => $usersDoctorsAppointments]);
    }

    public function allDepartments(){

        $allDepartments=departments::all();

        return view('admin.allDepartments', ['allDepartments' => $allDepartments]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function allUsers()
    {

        $allUsers = User::all();
        // $approved = doctor::all('status')->where('status','=','Approve');
        // $pending = doctor::all('status')->where('status','=','pending ');
        // dd(count($allUsers));
        return view('admin/allUsers', ['allUsers' => $allUsers]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     */
    public function addProduct(Request $request)
    {
        $product = new product();
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $image = base64_encode(file_get_contents($request->file('image')));
        $product->image = $image;
        $product->save();

        return redirect('/admin/allProduct');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function allDonations(){

        $donations = Donation::all();

        return view('admin.donations' , ['donations' => $donations]);
    }

    public function allDepartmentspost(Request $request){

        $Department = new departments();
        $Department->name = $request->name;
        $Department->description = $request->description;
        $Department->numberOfMembers = $request->members;

        $Department->save();
        return redirect('/admin/allDepartments');


    }

    public function deleteDepartment($id){


        $Department = departments::destroy($id);

        return response()->json($Department);
    }

    public function editDepartment($id){

        $Department = departments::find($id);

        return view('admin.editDepartment' , ['Department' => $Department]);

    }

    public function storeEditDepartment($id){

        departments::where('id', $id)->update(['name' => request('name'), 'description' => request('description'), 'numberOfMembers' => request('Members')]);

        return redirect('/admin/allDepartments')->with('mssg', 'Department information updated successfully');


        

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editUser($id)
    {
        $user = User::find($id);

        return view('admin.editUser', ['user' => $user]);
    }

    public function editProduct($id)
    {
        $product = product::find($id);

        return view('admin.editProduct', ['product' => $product]);
    }

    public function editDoctor($id)
    {
        $doctor = doctor::find($id);

        return view('admin.editDoctor', ['doctor' => $doctor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function storeEdit(Request $request, $id)
    {
        // dd($request);
        //TODO: handle update user
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->save();
        return redirect('admin/allUsers')->withSuccess('User Updated');
    }

    public function storeEditProduct(Request $request, $id)
    {

        $product = product::find($id);
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $image = base64_encode(file_get_contents($request->file('image')));
        $product->image = $image;
        $product->save();
        return redirect('admin/allProduct')->withSuccess('Product Updated');
    }

    public function storeEditDoctor(Request $request, $id)
    {
        //TODO: handle update doctor
        //        dd($request);
        $doctor = doctor::find($id);
        $doctor->email = $request->email;
        $doctor->name = $request->name;
        $doctor->password = $request->password;
        $image = base64_encode(file_get_contents($request->file('image')));
        $doctor->image = $image;
        $certificate = base64_encode(file_get_contents($request->file('certificate')));
        $doctor->certificate = $certificate;
        $doctor->status = $request->status;
        $doctor->save();
        return redirect('admin')->withSuccess('Doctor Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     */
    public function destroy($id)
    {
        $allUsers = User::destroy($id);

        return response()->json($allUsers);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     */
    public function deleteDoctor($id)
    {
        $doctor = doctor::destroy($id);

        return response()->json($doctor);
    }

    public function deleteProduct($id)
    {
        $product = product::destroy($id);

        return response()->json($product);
    }

    public function deleteAppointment($id)
    {
        $appointment = appointment::destroy($id);
        return response()->json($appointment);
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function allOrder()
    {

        $allOrders = Order::all();
        $approved = Order::all('status')->where('status', '=', 'Approve');
        $pending = Order::all('status')->where('status', '=', 'pendding');
        return view('admin.allOrder', ['allOrders' => $allOrders, 'approved' => $approved, 'pending' => $pending]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     */
    public function deleteOrder($id)
    {
        $order = Order::destroy($id);

        return response()->json($order);
    }



    public function editOrder($id)
    {
        $order = Order::find($id);

        return view('admin.editOrder', ['order' => $order]);
    }



    public function storeEditOrder(Request $request, $id)
    {

        $order = Order::find($id);
        $order->user_id = $request->user_id;
        $order->product_id = $request->product_id;
        $order->national = $request->national;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->status = $request->status;
        $order->save();
        return redirect('admin')->withSuccess('Order Updated');
    }
}
