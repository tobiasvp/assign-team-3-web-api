@extends('layouts.app')

@section('content')
    <div class="container">

  


        {{-- {!! $products->links() !!} --}}


        <div class="panel panel-default">
            <div class="panel-body"><a href="{{ route('products.index') }}">Master Product</a></div>
            <div class="panel-body"><a href="{{ route('users.index') }}">Master User</a></div>

            <div class="panel-body"><a href="{{ route('users.index') }}">Report Sales</a></div>
        </div>





   
        <br>

     
    </div>
@endsection
