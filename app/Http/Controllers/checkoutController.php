<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Customer;
use App\Bill;
use App\Bill_detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class checkoutController extends Controller
{
    public function postCheckOut(Request $request)
    {
        // validate
        $rule = [
            'fullName' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phoneNumber' => 'required|digits_between:10,12'

        ];

        $validator = Validator::make(Input::all(), $rule);

        if ($validator->fails()) {
            return redirect('getcheckout')
                ->withErrors($validator)
                ->withInput();
        }


        try {
            DB::transaction(function () use ($request) {
                $customer = Customer::query()->firstOrCreate([
                    'customer_email' => $request->get('email'),
                    'customer_phone' => $request->get('phoneNumber'),
                ], [
                    'customer_name' => $request->get('fullName'),
                    'customer_adress' => $request->get('address'),
                ]);

                $bill = new Bill;
                $bill->customer_id = $customer->customer_id;
                $bill->bill_date = now();
                $bill->bill_total = Session::get('total');

                $bill->save();
                $carts = Session::get('carts') ?? [];

                if (count($carts) > 0) {
                    foreach ($carts as $key => $item) {
                        $billDetail = new Bill_detail;
                        $billDetail->bill_id = $bill->bill_id;
                        $billDetail->product_id = $item['id'];
                        $billDetail->quantity = $item['qty'];
                        $billDetail->price = $item['price'];
                        $billDetail->save();
                    }
                }
                // del
                Session::forget('carts');
                Session::forget('total');
            });
        } catch (Exception $e) {
            Log::error($e->getMessage());
        }


        return redirect(url('/checkout-success'));
    }

    public function checkoutSuccess()
    {
        return view('fontend.checkout_success');
    }
}
