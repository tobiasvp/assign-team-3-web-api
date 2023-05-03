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
                <div class="card">


                    <div class="card-body">

                        <h4> Tampil Id Barang {{ $product->id }} </h4>

                        {{-- <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"> --}}
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Nama Barang:</strong>
                                    <input type="text" name="nama_barang" class="form-control"
                                        value="{{ $product->nama_barang }}" placeholder="Nama Barang" readonly>
                                    @error('nama')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Deskripsi:</strong>
                                    <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" readonly
                                        value="{{ $product->deskripsi }}">
                                    @error('deskripsi')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Jenis Barang:</strong>
                                    <input type="text" name="jenis_barang" class="form-control" readonly
                                        value="{{ $product->jenis_barang }}" placeholder="Jenis Barang">
                                    @error('jenis_barang')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Stock Barang:</strong>
                                    <input type="number" name="stock_barang" class="form-control" readonly
                                        value="{{ $product->stock_barang }}" placeholder="Stock Barang">
                                    @error('stock_barang')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Harga Beli:</strong>
                                    <input type="text" name="harga_beli" class="form-control" placeholder="Harga Beli" readonly
                                        value="{{ $product->harga_beli }}">
                                    @error('harga_beli')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Harga Jual:</strong>
                                    <input type="text" name="harga_jual" class="form-control" placeholder="Harga Jual" readonly
                                        value="{{ $product->harga_jual }}">
                                    @error('harga_jual')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Image Barang:</strong>
                                    <img style="height: 100px; width: 150px;" src="{{ Storage::url($product->image) }}   ">
                                    @error('image')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>



                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <br>
                                <div class="form-group">
                                    {{-- <button type="submit" class=></button> --}}
                                    <a href="{{ route('products.index') }}" class="btn btn-primary ml-3">Back</a>
                                </div>
                            </div>

                        </div>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $product->detail }}
            </div>
        </div>
    </div> --}}
@endsection
