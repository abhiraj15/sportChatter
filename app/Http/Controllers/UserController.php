<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\Http\Requests\LoginRequest;
use \Session,\Redirect;
class UserController extends Controller
{

    use AuthenticatesUsers;
    protected $redirectTo = '/posts';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('users.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doLogin(Request $request)
    {

        if (!Auth::attempt(['email' => $request->input('email'), 'password' => ($request->input('password'))])) {
            Session::flash('danger', 'Invalid email id or password.');
            return Redirect::to('/login');
        }
       
         return Redirect::to('/home');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
         return view('users.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function doRegister(LoginRequest $request)
    {
        $user           = new User;
        $user->name     = $request->input('name');
        $user->email    = $request->input('email');
        $user->role_id  = '5a60375dbf6a4a45214cc26c';
        $user->password = $request->input('password');
        $user->save();
        Session::flash('message', 'You have successfully register user');
        return Redirect::to('/login');

    }

     public function logout()
    {
        Auth::logout();
        return Redirect::to('/login');
    }



}
