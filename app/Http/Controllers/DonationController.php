<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function index()
    {
        $sum = Donation::sum('donationAmount');
        $show = Donation::latest()->take(3)->get();

        return view('/donation', ['sum' => $sum, 'show' => $show]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $donation = $request->validate([
            'donationAmount' => ['required', 'integer'],
            'emailDon' => ['required', 'string', 'email', 'max:255'],
            'billingAddress' => ['required'],
            'cardholderName' => ['required'],
            'expirationDate' => ['required'],
            'securityCode' => ['required', 'integer'],
            'cardNo' => ['required', 'numeric', 'digits:16'],
            'zip' => ['required', 'integer'],
        ]);

        Donation::create($donation);


        return redirect('/donation')->with('success', 'Thank you for the donation.');
    }
}
