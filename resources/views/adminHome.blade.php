@extends('layouts.app')

@section('content')
    <div class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif



        {{-- {!! $products->links() !!} --}}




        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row justify-content-center">
                    <div class="col-lg-12 margin-tb">
                        {{-- <div class="pull-left">
                            List Product
                        </div> --}}
                        <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                    </div>
                </div>

                <br>
                <div class="card">
                    <div class="card-header">
                        List Barang

                    </div>

                    <div class="card-body">

                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Deskripsi</th>
                                <th>Jenis Barang</th>
                                <th>Stock Barang</th>
                                {{-- <th>Harga Beli</th>
                                <th>Harga Jual</th> --}}
                                <th>Gambar Barang</th>
                                {{-- <th>Action</th> --}}
                                {{-- <th>Details</th> --}}
                                <th width="200px">Action</th>
                            </tr>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $product->nama_barang }}</td>
                                    <td>{{ $product->deskripsi }}</td>

                                    <td>{{ $product->jenis_barang }}</td>
                                    <td>{{ $product->stock_barang }}</td>
                                    {{-- 
                                    <td>{{ $product->harga_beli }}</td>

                                    <td>{{ $product->harga_jual }}</td> --}}

                                    @if ($product->image)
                                        <td>
                                            <img style="height: 100px; width: 150px;"
                                                src="{{ Storage::url($product->image) }}   ">
                                        </td>
                                    @else
                                        <td> <span>No image found!</span></td>
                                    @endif

                                    <td>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            <a class="btn btn-info"
                                                href="{{ route('products.show', $product->id) }}">Show</a>
                                            <a class="btn btn-primary"
                                                href="{{ route('products.edit', $product->id) }}">Edit</a>
                                            {{-- <a class="btn btn-info" href="#">Show</a> --}}
                                            {{-- <a class="btn btn-primary" href="#">Edit</a> --}}

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
