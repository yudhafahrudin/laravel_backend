<?php
/*
 * Since: 16-02-208
 * Author:  Taichu
 * User List Controller is controller for access all of user regsitered in database
 */

// Documentation

/* 16-02-2018
 * This controller have chache with key user.show that exist until 5 days
 * $userAll = $this->chaceCheck('user.show');
 */

// End Documentation

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserListController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function show() {
        
        $userAll = User::all()->sortByDesc('updated_at');

        return view('users.userList', array(
            'userAll' => $userAll,
            'listNomor' => 1,
            'title' => 'User')
        );
    }

}
