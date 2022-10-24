<?php

namespace App\Http\Controllers;

use App\Models\doctor;
use App\Models\product;
use App\Models\departments;
use App\Models\Testimonial;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
