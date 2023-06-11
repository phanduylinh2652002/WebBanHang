<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class cartController extends Controller
{

    public function cart(Request $request)
    {
        $carts = Session::get('carts') ?? [];
        $product_id = $request->get('product_id');
        $product = Product::query()->findOrFail($product_id);
        $productKey = sprintf('product_id_%s', $product_id);

        if (!array_key_exists($productKey, $carts)) {
            $carts[$productKey] = [
                'id' => $product_id,
                'name' => $product->product_name,
                'option' => $product->image,
                'price' => $product->product_discount,
                'qty' => 1,
                'subtotal' => $product->product_discount * 1,
            ];
        } else {
            $productCart = $carts[$productKey];
            $productCart['qty'] = $productCart['qty'] + 1;
            $productCart['subtotal'] = $productCart['qty'] * $productCart['price'];
            $carts[$productKey] = $productCart;
        }
        Session::put('carts', $carts);
        $this->totalCart();

        return Redirect(url('showcart'));
    }

    public function index()
    {
        $carts = Session::get('carts') ?? [];

        return view('fontend.cart', compact('carts'));

    }


    public function up(Request $request)
    {
        $carts = Session::get('carts') ?? [];
        $product_id = $request->get('product_id');
        Product::query()->findOrFail($product_id);
        $productKey = sprintf('product_id_%s', $product_id);
        if (array_key_exists($productKey, $carts)) {
            $productCart = $carts[$productKey];
            $productCart['qty'] = $productCart['qty'] + 1;
            $productCart['subtotal'] = $productCart['qty'] * $productCart['price'];
            $carts[$productKey] = $productCart;
        }
        Session::put('carts', $carts);
        $this->totalCart();

        return Redirect(url('showcart'));
    }

    public function down(Request $request)
    {
        $carts = Session::get('carts') ?? [];
        $product_id = $request->get('product_id');
        Product::query()->findOrFail($product_id);
        $productKey = sprintf('product_id_%s', $product_id);
        if (array_key_exists($productKey, $carts)) {
            $productCart = $carts[$productKey];
            if ($productCart['qty'] === 1) {
                unset($carts[$productKey]);
            } else {
                $productCart['qty'] = $productCart['qty'] - 1;
                $productCart['subtotal'] = $productCart['qty'] * $productCart['price'];
                $carts[$productKey] = $productCart;
            }
        }
        Session::put('carts', $carts);
        $this->totalCart();

        return Redirect(url('showcart'));
    }


    public function remove(Request $request)
    {
        $carts = Session::get('carts') ?? [];
        $product_id = $request->get('product_id');
        Product::query()->findOrFail($product_id);
        $productKey = sprintf('product_id_%s', $product_id);
        if (array_key_exists($productKey, $carts)) {
            unset($carts[$productKey]);
        }
        Session::put('carts', $carts);
        $this->totalCart();

        return Redirect(url('showcart'));
    }

    public function destroy()
    {
        Session::forget('carts');

        return Redirect(url('showcart'));
    }

    public function getCheckOut()
    {
        $carts = Session::get('carts') ?? [];
        if (empty($carts)) {
            return Redirect(url(''));
        }

        return view('fontend.checkout', compact('carts'));
    }

    /**
     * @return void
     */
    private function totalCart()
    {
        $carts = Session::get('carts') ?? [];
        $total = 0;
        foreach ($carts as $cart) {
            $total += $cart['subtotal'];
        }

        if (!empty($carts)) {
            Session::put('total', $total);
        }
    }
}
