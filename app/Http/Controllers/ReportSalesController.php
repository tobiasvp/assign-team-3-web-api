<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportSalesController extends Controller
{
    //


    public function index()
    {
        //
        $products = Product::latest()->paginate();
        return view('product.index_product', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
