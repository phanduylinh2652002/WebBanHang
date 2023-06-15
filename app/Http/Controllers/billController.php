<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Bill_detail;
use App\Product;
use App\Customer;


class billController extends Controller
{
    public function getbill()
    {
        $bills = Bill::join('customers', 'customers.customer_id', 'bills.customer_id')
            ->select(
                'bills.bill_id',
                'customers.customer_name',
                'customers.customer_phone',
                'bills.bill_date',
                'bills.bill_total'
            )
            ->paginate(5);

        return view('admin.bill.index', compact('bills'));
    }

    public function billdetail($id)
    {
        $bill_detail = Bill::leftjoin('bill_details', 'bill_details.bill_id', 'bills.bill_id')
            ->leftjoin('products', 'bill_details.product_id', 'products.product_id')
            ->where('bills.bill_id', $id)
            ->select(
                'products.product_id',
                'products.product_name',
                'bill_details.price',
                'bill_details.quantity'

            )
            ->get();
        $bill_customer = Bill::join('customers', 'customers.customer_id', 'bills.customer_id')
            ->join('bill_details', 'bill_details.bill_id', 'bills.bill_id')
            ->where('bills.bill_id', $id)
            ->select(
                'customers.customer_name',
                'customers.customer_phone',
                'customers.customer_adress',
                'customers.customer_email'

            )->firstOrFail();

        return view('admin.bill.detail', compact('bill_detail', 'bill_customer'));

    }


}
