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

                        <h4> Edit Barang </h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        
                        <form action="{{ route('products.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nama Barang:</strong>
                                        <input type="text" name="nama_barang" class="form-control"
                                            value="{{ $product->nama_barang }}" placeholder="Nama Barang">
                                        @error('nama')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Deskripsi:</strong>
                                        <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi"
                                            value="{{ $product->deskripsi }}">
                                        @error('deskripsi')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Jenis Barang:</strong>
                                        <input type="text" name="jenis_barang" class="form-control"
                                            value="{{ $product->jenis_barang }}" placeholder="Jenis Barang">
                                        @error('jenis_barang')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Stock Barang:</strong>
                                        <input type="number" name="stock_barang" class="form-control"
                                            value="{{ $product->stock_barang }}" placeholder="Stock Barang">
                                        @error('stock_barang')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Harga Beli:</strong>
                                        <input type="text" name="harga_beli" class="form-control"
                                            value="{{ $product->harga_beli }}" placeholder="Harga Beli">
                                        @error('harga_beli')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Harga Jual:</strong>
                                        <input type="text" name="harga_jual" class="form-control"
                                            value="{{ $product->harga_jual }}" placeholder="Harga Jual">
                                        @error('harga_jual')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Image Barang:</strong>
                                        <input type="file" name="image" class="form-control"
                                            placeholder="Image Barang">
                                 
                                        <img style="height: 100px; width: 150px;"
                                            src="{{ Storage::url($product->image) }}   ">
                                        @error('image')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary ml-3">Update</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
