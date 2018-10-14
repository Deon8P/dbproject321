@extends('layouts.master')

@section('nav')

<div class="topnav" style="position: fixed; top:0%; left:0%; right: 0%;">
    <a href="/home">Home</a>
    <a class="active" href="/products">Products</a>
    <a href="/logout">Logout</a>
    <a href="#" class="float-right active" color="#71b346">{{ Auth::user()->username }}</a>
</div>

@endsection

@section('content')

@include('products.search')

@include('products.products')

@endsection
