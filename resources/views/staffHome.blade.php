@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-body"><a href="{{ route('products.index') }}">Approve Transaction</a></div>
            <div class="panel-body"><a href="{{ route('products-management.index') }}">Master Product</a></div>
        </div>
    </div>
@endsection
