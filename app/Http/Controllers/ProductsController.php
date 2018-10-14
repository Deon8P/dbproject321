<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Product;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$products = Product::paginate(50);

    	return view('products.index', compact('products'));
    }

    public function search()
    {
        if(! request('search'))
            return $this->index();

    	$products = Product::where('prod_name', 'LIKE', '%'.request('search').'%')->paginate(50);

    	return view('products.index', compact('products'));
    }
}
