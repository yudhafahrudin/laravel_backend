<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Http\Controllers\Controller;

class UserTrashController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    protected function show() {
        $userTrashed = User::onlyTrashed()->get()->sortByDesc('updated_at');
        return view('user.userTrash', array(
            'userAllTrashed' => $userTrashed,
            'listNomor' => 1,
            'title' => 'User Trashed')
        );
    }

    protected function restore($id) {
        try {

            $user = User::onlyTrashed()->where('id', $id)->first();
            $userName = object_get($user, 'username');
            $user->restore();

            return redirect('/user/trash/all')->with('message', 'User [ ' . $userName . ' ] restored');
        } catch (ValidatorException $e) {
            return redirect('/user/trash/all')->with('message', $e->getMessageBag());
        }
    }

    protected function destroy($id) {
        try {

            // Collecting data
            $user = User::onlyTrashed()->where('id', $id)->first();
            $userNameKey = object_get($user, 'username');

            // Logging action
            $this->loggingInfo('User with username ' . $userNameKey . ' destroyed', $user->toArray());
            
            // If logging success user data will destroyed
            $user->forceDelete();

            return redirect('/user/trash/all')->with('message', 'User [ ' . $userNameKey . ' ] destroyed');
        } catch (ValidatorException $e) {
            return redirect('/user/trash/all')->with('message', $e->getMessageBag());
        }
    }

}
