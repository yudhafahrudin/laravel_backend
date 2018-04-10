<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Traits\UploadImage;

class UserController extends Controller {

    protected $request;

    use UploadImage;

    public function __construct(Request $request) {
        parent::__construct();
        $this->request = $request;
    }

    protected function validatorImage(array $data) {
        return Validator::make($data, [
                    'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:1024'
        ]);
    }

    protected function validator(array $data, $type = null) {

        $validator_requrement = [
            'name' => 'string|max:255',
        ];

        $email_check = array_get($data, 'email');

        $email_valid_array = ['email' => 'required|string|email|max:255|unique:users'];

        if (!$email_check == null) {
            $validator_requrement = array_merge($validator_requrement, $email_valid_array);
        }

        return Validator::make($data, $validator_requrement);
    }

    public function showEdit($id) {
        $user = User::find($id);
        return view('user.edit', array('title' => 'User', 'user_edit' => $user));
    }

    public function showDetailUser($id) {
        $userFind = User::find($id);
        return view('user.showUserDetail', array(
            'userFind' => $userFind,
            'title' => 'User')
        );
    }

    public function showProfileUser($username) {
        $userFind = User::where('username', $username)->get();

        return view('user.profile', array(
            'userFind' => $userFind[0],
            'title' => $userFind[0]->name)
        );
    }

    protected function edit($id) {

        $validator = $this->validator($this->request->all(), 'edit');
        if ($validator->fails()) {
            return redirect()->back()->with(['message' => 'Your custom message here', 'status' => 'error']);
//            return redirect()->back()->withErrors($validator);
        } else {

            // store
            $user = User::find($id);
            $user->name = object_get($this->request, 'name');
            $email = object_get($this->request, 'email');

            ( $email ? $user->email = $email : '');

            $user->description = object_get($this->request, 'description');
            $user->save();

//            $this->validatorImage($request->all())->validate();
            $this->postImage($request);

            // redirect
            return redirect()->back()->with(['message' => 'User [' . object_get($user, 'username') . '] updated!', 'status' => 'success']);
//            return redirect()->back()->with('message', 'User updated!');
        }
    }

    protected function delete($user) {

        try {

            $user = User::find($user);
            $userName = object_get($user, 'name');
            $user->delete();

            return redirect('user')->with('message', 'User [ ' . $userName . ' ] deleted');
        } catch (ValidatorException $e) {
            return redirect('user')->with('message', $e->getMessageBag());
        }
    }

}
