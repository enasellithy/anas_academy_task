<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function index()
    {
        return view('stripe');
    }

    public function store(Request $r)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $customer = Stripe\Customer::create(array(

            "address" => [

                "line1" => "Line 1",

                "postal_code" => "11511",

                "city" => "Cairo",

                "state" => "Maadi",

                "country" => "EG",

            ],

            "email" => "enas@gmail.com",

            "name" => "Enas Test",

            "source" => $r->stripeToken

        ));



        Stripe\Charge::create ([

            "amount" => 100 * 100,

            "currency" => "usd",

            "customer" => $customer->id,

            "description" => "Test payment",

            "shipping" => [

                "name" => "Jenny Rosen",

                "address" => [

                    "line1" => "Line St",

                    "postal_code" => "11511",

                    "city" => "Cairo",

                    "state" => "Maadi",

                    "country" => "EG",

                ],

            ]

        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
}
