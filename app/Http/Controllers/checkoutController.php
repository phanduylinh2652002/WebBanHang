<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;
use App\Customer;
use App\Bill;
use App\Bill_detail;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class checkoutController extends Controller
{
    public function postCheckOut(Request $request)
    {

    	 $cartInfor = Cart::content();
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
            // save
            $customer = new Customer;
            $customer->customer_name = $request->get('fullName');
            $customer->customer_adress = $request->get('address');
            $customer->customer_phone = $request->get('phoneNumber');
            $customer->customer_email = $request->get('email');


            $customer->save();

            $bill = new Bill;
            $bill->customer_id = $customer->customer_id;
            $bill->bill_date = date('Y-m-d H:i:s');
            $bill->bill_total = str_replace(',', '', Cart::total());

            $bill->save();

            if (count($cartInfor) >0) {
                foreach ($cartInfor as $key => $item) {
                    $billDetail = new Bill_detail;
                    $billDetail->bill_id = $bill->bill_id;
                    $billDetail->product_id = $item->id;
                    $billDetail->quantity = $item->qty;
                    $billDetail->price = $item->price;
                    $billDetail->save();
                }
            }
          // del
           Cart::destroy();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return redirect(url(''));
    }
}
