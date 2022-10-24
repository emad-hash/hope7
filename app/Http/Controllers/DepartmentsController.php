<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\product;
use App\Models\departments;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index()
    {
        
        $Departments = departments::all();
        $products = product::all();
        $doctor = doctor::all();
        $testimonials=Testimonial::all();
        return view('Home.index', ['Department' => $Departments, 'products' => $products, 'doctors' => $doctor,'testimonials'=>$testimonials]);
    }
}
