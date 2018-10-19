<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\Product;
//use Yajra\DataTables\Utilities\Request;

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

    public function saveComparison(Request $request)
    {
        DB::connection('oracle')->table('compare_products')->insert([
            'user_id' => Auth::user()->id,
            'prod_id_1' => $request->input('prod1'),
            'prod_id_2' => $request->input('prod2'),
            'prod_disc_1' => $request->input('disc1'),
            'prod_disc_2' => $request->input('disc2'),
            'prod_price_1' => $request->input('price1'),
            'prod_price_2' => $request->input('price2'),
            'created_at' => date("Y-m-d h:i:s"),
            'updated_at' => date("Y-m-d h:i:s")

        ]);

        $price1 = str_replace('R','',$request->input('price1'));
        $price2 = str_replace('R','',$request->input('price2'));

        $price1 = str_replace(',','',$price1);
        $price2 = str_replace(',','',$price2);

        $price1 = (float) $price1;
        $price2 = (float) $price2;

        if($price1 > $price2){
            $message = "Product 1 is cheaper by R".($price1-$price2).', Description: '.$request->input('disc1');
        }else{
            $message = "Product 2 is cheaper by R".($price2-$price1).', Description: '.$request->input('disc2');
        }

        return back()->with('status', $message);
    }
}
