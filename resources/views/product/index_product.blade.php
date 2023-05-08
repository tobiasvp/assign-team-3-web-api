@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif



    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row justify-content-center">
                <div class="col-lg-12 margin-tb">
                    {{-- <div class="pull-left">
                    List Product
                </div> --}}

                    @if (request()->routeIs('products-management.index'))
                        {{-- <body class="dashboard" id="top"> --}}
                        <h3>true</h3>
                        <a class="btn btn-success" href="{{ route('products-management.create') }}"> Create New Product</a>

                        <a class="btn btn-danger" href="{{ route('staff.home') }}"> Back</a>
                        {{-- {{ URL::current() }} --}}
                    @else
                        <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>

                        <a class="btn btn-danger" href="{{ route('admin.home') }}"> Back</a>
                        <h4>false</h4>
                        {{-- {{ URL::current() }} --}}
                        {{-- <body class="not-dashboard" id="not-top"> --}}
                    @endif

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

                            <th>Gambar Barang</th>

                            <th width="200px">Action</th>
                        </tr>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $product->nama_barang }}</td>
                                <td>{{ $product->deskripsi }}</td>

                                <td>{{ $product->jenis_barang }}</td>
                                <td>{{ $product->stock_barang }}</td>


                                @if ($product->image)
                                    <td>
                                        <img style="height: 100px; width: 150px;"
                                            src="{{ Storage::url($product->image) }}   ">
                                    </td>
                                @else
                                    <td> <span>No image found!</span></td>
                                @endif



                                {{-- @if (request()->routeIs('products-management.index')) --}}
                                   

                                    <td>
                                        <form action="{{ route('products-management.destroy', $product->id) }}"
                                            method="POST">
                                            {{-- <a class="btn btn-info" href="{{ route('products-management.show', $product->id) }}">Show</a> --}}
                                            <a class="btn btn-primary"
                                                href="{{ route('products-management.edit', $product->id) }}">Edit</a>
                                            true

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                {{-- @else
                                   
                                @endif --}}

                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
