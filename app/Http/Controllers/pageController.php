<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Slide;
use App\Category;

class pageController extends Controller
{
    function getindex()
    {
        $slide = Slide::all();
        $hotproduct = Product::where('product_hot', true)->orderby('product_id', 'desc')->limit(9)->get();
        $disproduct = Product::where('product_discount', '>', '0')->orderby('product_id', 'desc')->limit(9)->get();
        $newproduct = Product::orderby('product_id', 'desc')->limit(4)->get();

        return view('fontend.trangchu', compact('slide', 'hotproduct', 'disproduct', 'newproduct'));
    }

    function getloaisp($type)
    {
        $loaisanpham = Product::where('category_id', $type)->paginate(9);
        $category = Category::all();

        return view('fontend.loaisanpham', compact('loaisanpham', 'category'));
    }

    function getchitiet($id)
    {
        $chitiet = Product::where('product_id', $id)->first();
        $splienquan = Product::where('product_id', '<>', $id)->orderby('product_id', 'desc')->limit(4)->get();
        return view('fontend.chitiet', compact('chitiet', 'splienquan'));

    }

    public function search(Request $req)
    {
        $product = Product::where('product_name', 'like', '%' . $req->key . '%')
            ->orwhere('product_price', $req->key)
            ->paginate(12);

        return view('fontend.search', compact('product'));
    }

}
