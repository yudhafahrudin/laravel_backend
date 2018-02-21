<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller {

    protected $request;

    public function __construct(Request $request) {
        parent::__construct();
        $this->request = $request;
    }

    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'string|max:255',
        ]);
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

        $validator = $this->validator($this->request->all());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            // store
            $nerd = User::find($id);
            $nerd->name = object_get($this->request, 'name');
            $nerd->save();

            // redirect
            return redirect()->back()->with('message', 'User updated!');
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
