<?php 

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class LoginModel extends Model
{

    public static function check_user($username = '', $password = '') {
        // query
        $result = DB::table('users')
                    ->select('*')
                    ->where('email',$username)
                    ->where('password',$password)
                    ->get();

        $result = json_decode(json_encode($result),true);
        
        return !empty($result) ? $result[0]  : [];
    }
}