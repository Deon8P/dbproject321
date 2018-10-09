<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
    	$products = Product::all();

    	return view('index', compact('products'));
    }

    public function search()
    {
    	$products = Product::where('prod_name', 'LIKE', '%'.request('search').'%');

    	return view('products', compact('products'));
    }
}
