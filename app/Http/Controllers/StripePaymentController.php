<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        try{
            DB::beginTransaction();
            Transaction::create(['user_id' => Auth::id(), 'amount' => $r->amount]);
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
            DB::commit();
            /* Transaction successful. */
        }catch(\Exception $e){

            return DB::rollback();
        }
        Session::flash('success', 'Payment successful!');

        return back();
    }
}
