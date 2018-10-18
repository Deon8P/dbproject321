<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use App\User;

class RegistrationsController extends Controller
{
    public function index()
    {
        return view('registration.index');
    }

    public function storeUser(Request $request)
    {
        try {
            $this->validate(request(), [
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed|min:6',
            ]);


            $username = $request->input('username');
            $email = $request->input('email');
            $password = $request->input('password');

            DB::connection('oracle')->table('users')->insert([
                'username' => $username,
                'email' => $email,
                'password' => bcrypt($password),
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d")
            ]);

            $user = [
                'username' => request('username'),
                'password' => request('password')
            ];

            if(!auth()->attempt($user)){
                redirect('/login')->withErrors([
                    'message' => 'We failed to authenticate you...sorry.'
                ]);
            }

            return redirect('/home');

        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

    }
}
