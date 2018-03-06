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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
    protected $pathImageOriginal;
    protected $pathImageThumbnail;
    protected $pathImageTemp;
    protected $pathThumb;
    protected $pathOriginal;

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
                    'path_thumb' => $this->pathThumb,
                    'path_original' => $this->pathOriginal,
        ]);
    }

    public function showRegistrationForm() {
        return view('auth.register', array('title' => 'User'));
    }

    public function register(Request $request) {

        $this->validator($request->all())->validate();
        $this->validatorImage($request->all())->validate();
        $this->postImage($request);
        event(new Registered($user = $this->create($request->all())));

//        $this->guard()->login($user);

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

    public function postImage(Request $request) {
        $photo = $request->file('photo');

        // File named
        $imagename = time() . '.' . $photo->getClientOriginalExtension();

        // Random indefitier
        $rand = \Carbon\Carbon::parse()->format('Ymd') . '/' . rand();
        $this->pathImageTemp = '/user/images/profile/';
        $this->pathImageThumbnail = $request->username . '/' . $rand . '/';

        /*         * ****************** THUMBNAIL IMAGE *************************** */
        $fullPath = $this->pathImageTemp . $this->pathImageThumbnail . 'thumb/';
        // Make directory
        $this->makeDirectory($fullPath);
        // Generating save temp image
        $thumbImg = Image::make($photo->getRealPath())->resize(200, 200);
        $fileImage = $thumbImg->save($fullPath . $imagename);
        // Save to storage disk
        Storage::disk('public')->put($fullPath . $imagename, $fileImage->__toString());
        // Path Tumb
        $this->pathThumb = $this->pathImageThumbnail . 'thumb/' . $imagename;

        /*         * ****************** ORIGINAL IMAGE *************************** */
        $fullPath = $this->pathImageTemp . $this->pathImageThumbnail . 'original/';
        // Make directory
        $this->makeDirectory($fullPath);
        // Generating save temp image
        $originalImg = Image::make($photo->getRealPath());
        $originalImg->save($fullPath . $imagename);
        // Save to storage disk
        Storage::disk('public')->put($fullPath . $imagename, $originalImg->__toString());
        // Path Tumb
        $this->pathOriginal = $this->pathImageThumbnail . 'original/' . $imagename;
    }

    public function registered(Request $request, $user) {
        return redirect()->back()->with('message', 'User registration is success!');
    }

}
