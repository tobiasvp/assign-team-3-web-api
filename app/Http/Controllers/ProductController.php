<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products = Product::latest()->paginate();
        return view('adminHome', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('product/create_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'jenis_barang' => 'required',
            'stock_barang' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $imagePath = $request->file('image')->store('public/images');


        $product = new  Product([
            'nama_barang' => $request->get('nama_barang'),
            'deskripsi' => $request->get('deskripsi'),
            'jenis_barang' => $request->get('jenis_barang'),
            'stock_barang' => $request->get('stock_barang'),
            'harga_beli' => $request->get('harga_beli'),
            'harga_jual' => $request->get('harga_jual'),
            'image' => $imagePath,
        ]);

        $product->save();


        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return view('product.show_product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        return view('product.edit_product', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $request->validate([
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'jenis_barang' => 'required',
            'stock_barang' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $imagePath = $request->file('image')->store('public/images');


        // $product->update(
        //     $request->all()
        // );

        $value = [
            'nama_barang' => $request->get('nama_barang'),
            'deskripsi' => $request->get('deskripsi'),
            'jenis_barang' => $request->get('jenis_barang'),
            'stock_barang' => $request->get('stock_barang'),
            'harga_beli' => $request->get('harga_beli'),
            'harga_jual' => $request->get('harga_jual'),
            'image' => $imagePath,
        ];

        // var_dump($value);
        // die();

        $product->update($value);
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully');
    }
}
