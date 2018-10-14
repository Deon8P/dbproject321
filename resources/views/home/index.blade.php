@extends('layouts.master')

@section('nav')

<div class="topnav" style="position: fixed; top:0%; left:0%; right: 0%;">
    <a class="active" href="/home">Home</a>
    <a href="/products">Products</a>
    <a href="/logout">Logout</a>
    <a href="#" class="float-right active" color="#71b346">{{ Auth::user()->username }}</a>
</div>

@endsection

@section('content')

<h1>Hello World! 00111101101000 10001 01100101 00111010 1010001 010001 0110 10</h1>

@endsection
