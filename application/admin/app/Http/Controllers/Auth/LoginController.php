<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {


use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function username() {
        return 'username';
    }

//    protected function authenticated(Request $request, $user) {
//        $this->chaceCheck('user.login', json_encode($user->toArray()));
//    }

}
