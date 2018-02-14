<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
      |
     */

use RegistersUsers;

    protected $redirectTo = '/add_user';

    public function __construct() {
        parent::__construct();
    }

    protected function validator(array $data) {
        return Validator::make($data, [
                    'username' => 'required|string|max:255|unique:users',
                    'name' => 'string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data) {

        return User::create([
                    'username' => $data['username'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
        ]);
    }

    public function showRegistrationForm() {
        return view('auth.register', array('title' => 'User Registration'));
    }

    public function register(Request $request) {

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

//        $this->guard()->($user);

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    public function registered(Request $request, $user) {
        return redirect()->back()->with('message', 'User registration is success!');
    }

}
