<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\LoginModel;
use Session;

class LoginController extends Controller
{

    public function login(Request $request) {

        if (Session::has('user_id')) {
            return redirect()->to('dashboard');
        }
        
        return view('login');

    }

    public function logout(Request $request) {

        session()->flush();
        return redirect()->to('login');

    }

    public function check_user(Request $request) {
        // get the data from ajax
        $username = $request->username;
        $password = $request->password;

        // hash passwords
        // check if password is empty
        $password_prefix = '001e063737d03cfde999524c891f583687591d19';
        $password = !empty($password) ? hash('sha1',$password_prefix . $password) : '';

        //pass data to model for the query
        $result = LoginModel::check_user($username,$password);
        if (!empty($result)) {
            session()->put('user_id',$result['id']);
            return 1; //success
        }
        else{
            return 0; // fail
        }
    }
}
