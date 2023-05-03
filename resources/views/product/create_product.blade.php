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

                        <h4> Tambah Barang Baru</h4>

                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nama Barang:</strong>
                                        <input type="text" name="nama_barang" class="form-control"
                                            placeholder="Nama Barang">
                                        @error('nama')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Deskripsi:</strong>
                                        <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi">
                                        @error('deskripsi')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Jenis Barang:</strong>
                                        <input type="text" name="jenis_barang" class="form-control"
                                            placeholder="Jenis Barang">
                                        @error('jenis_barang')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Stock Barang:</strong>
                                        <input type="number" name="stock_barang" class="form-control"
                                            placeholder="Stock Barang">
                                        @error('stock_barang')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Harga Beli:</strong>
                                        <input type="text" name="harga_beli" class="form-control"
                                            placeholder="Harga Beli">
                                        @error('harga_beli')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Harga Jual:</strong>
                                        <input type="text" name="harga_jual" class="form-control"
                                            placeholder="Harga Jual">
                                        @error('harga_jual')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Image Barang:</strong>
                                        <input type="file" name="image" class="form-control" placeholder="Image Barang">
                                        {{-- <input type="text" name="harga_jual"
                                            placeholder="Harga Jual"> --}}
                                        @error('image')
                                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary ml-3">Submit</button>
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
