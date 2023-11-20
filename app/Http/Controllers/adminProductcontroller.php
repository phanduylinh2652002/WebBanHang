<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class adminProductcontroller extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        // $products = Product::latest()->paginate(5);
        $products = Product::join('categories','products.category_id','categories.category_id')
        ->select('products.product_name',
            'products.product_id',
            'products.product_price',
            'products.product_quantity',
            'products.product_hot',
            'categories.category_name',
            'products.image',
            'products.product_discount')
        ->paginate(5);

        return  view('admin.product.index', compact('products'));

    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $categories = Category::query()->get();

        return  view('admin.product.create', compact('categories'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([

            'category_id' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_discount' => 'required',
            'product_quantity' => 'required',
            'image'         =>  'required|image|max:2048',
            'description' => 'required',
            'product_hot' => 'required'

        ]);
        // up load ảnh
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        Product::query()->create([
            'category_id'        =>   $request->category_id,
            'product_name'       =>   $request->product_name,
            'product_price'        =>   (int)$request->product_price,
            'product_discount'        =>   (int)$request->product_discount,
            'product_quantity'        =>   (int)$request->product_quantity,
            'image'            =>   $new_name,
            'description'        =>   $request->description,
            'product_hot'        =>   (boolean)$request->product_hot
        ]);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return  view('admin.product.show',compact('product'));
    }

    /**
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product)
    {
        $categories = Category::query()->get();

        return view('admin.product.edit',compact('product', 'categories'));
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'product_name' => 'required',
                'product_price' => 'required',
                'product_discount' => 'required',
                'product_quantity' => 'required',
                'image'         =>  'image|max:2048',
                'description' => 'required',
                'product_hot' => 'required'

            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'product_name' => 'required',
                'product_price' => 'required',
                'product_discount' => 'required',
                'product_quantity' => 'required',
                'description' => 'required',
                'product_hot' => 'required'

            ]);
        }

        $form_data = array(
            'category_id'        =>   $request->category_id,
            'product_name'       =>   $request->product_name,
            'product_price'        =>   $request->product_price,
            'product_discount'        =>   $request->product_discount,
            'product_quantity'        =>   $request->product_quantity,
            'image'            =>   $image_name,
            'description'        =>   $request->description,
            'product_hot'        =>   $request->product_hot

        );

        $product->update($form_data);
        return redirect()->route('product.index');
    }

    /**
     * @param Product $product
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');

    }
}
