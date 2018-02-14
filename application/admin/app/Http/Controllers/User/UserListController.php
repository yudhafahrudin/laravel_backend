<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserListController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function show() {

        $userAll = User::all()->sortByDesc('id');
        
        return view('user.userList', array(
            'userAll' => $userAll,
            'listNomor' => 1,
            'title' => 'User List')
        );
        
    }

}
