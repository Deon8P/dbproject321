<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use User;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']);
    }

    public function create()
    {
        return view('session.create');
    }

    public function storeUserSession()
    {
        $this->validate(request(), [
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        $password = DB::connection('oracle')->table('users')->where('username', '=', request('username'))->pluck('password')->first();

        if($password){

           if(bcrypt(request('password') == $password)){
                $user = [
                    'username' => request('username'),
                    'password' => request('password')
                ];

                if(!auth()->attempt($user)){
                    redirect('login')->withErrors([
                        'message' => 'Please check your credentials and try again'
                    ]);
                }

                return redirect('/home');
           }

           redirect('login')->withErrors([
                'message' => 'Please check your credentials and try again'
            ]);
        }

    }

    public function destroy()
    {
        try {
            Auth::logout();

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect('/login');
    }
}
