<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Image;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Traits\UploadImage;

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

    protected $redirectTo = '/add_user';
    protected static $onlyOriginal = true;
    
    use RegistersUsers;
    use UploadImage;
   
    

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

    protected function validatorImage(array $data) {
        return Validator::make($data, [
                    'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);
    }

    protected function create(array $data) {
        return User::create([
                    'username' => $data['username'],
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'description' => $data['description'],
                    'password' => bcrypt($data['password']),
                    'created_by' => Auth::user()->username,
                    'path_thumb' => array_get($this->pathQuality, 'thumb'),
                    'path_original' => array_get($this->pathQuality, 'original'),
        ]);
    }

    public function showRegistrationForm() {
        return view('auth.register', array('title' => 'User'));
    }

    public function register(Request $request) {

        $this->validator($request->all())->validate();
        $this->validatorImage($request->all())->validate();
        $this->saveImage($request);
        event(new Registered($user = $this->create($request->all())));

//        $this->guard()->login($user);

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    public function registered(Request $request, $user) {
        return redirect()->back()->with('message', 'User registration is success!');
    }

}
