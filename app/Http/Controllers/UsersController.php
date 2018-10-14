<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('home.index');
    }

    public function updateManager($username)
    {
        try
        {
             if (request('username')) {
                    User::updateUserName($username, request('username'));
                }
            }
        catch (ModelNotFoundException $exception)
        {
            return back()->withError($exception->getMessage())->withInput();
        }

        return back()->with('status', 'Manager has been updated.');
   }

}
