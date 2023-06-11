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
        $bills = Bill::join('customer', 'customer.customer_id', 'bills.customer_id')
            ->select(
                'bills.bill_id',
                'customer.customer_name',
                'customer.customer_phone',
                'bills.bill_date',
                'bills.bill_total'
            )
            ->paginate(5);

        return view('admin.bill.index', compact('bills'));
    }

    public function billdetail($id)
    {
        $bill_detail = Bill::leftjoin('bill_detail', 'bill_detail.bill_id', 'bills.bill_id')
            ->leftjoin('products', 'bill_detail.product_id', 'products.product_id')
            ->where('bills.bill_id', $id)
            ->select(
                'products.product_id',
                'products.product_name',
                'bill_detail.price',
                'bill_detail.quantity'

            )
            ->get();
        $bill_customer = Bill::join('customer', 'customer.customer_id', 'bills.customer_id')
            ->join('bill_detail', 'bill_detail.bill_id', 'bills.bill_id')
            ->where('bills.bill_id', $id)
            ->select(
                'customer.customer_name',
                'customer.customer_phone',
                'customer.customer_adress',
                'customer.customer_email'

            )->first();

        return view('admin.bill.detail', compact('bill_detail', 'bill_customer'));

    }


}
