<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $history = DB::connection('oracle')->table('compare_products')->where('user_id', '=', Auth::user()->id)->get();

        return view('home.index', compact('history'));
    }
}
