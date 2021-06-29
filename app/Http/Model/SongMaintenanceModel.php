<?php 

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SongMaintenanceModel extends Model
{

    public static function get_song_list() {
        // query
        $result = DB::table('song')
                    ->select('*')
                    ->whereNull('deleted_at')
                    ->get();

        $result = json_decode(json_encode($result),true);
        
        return !empty($result) ? $result  : [];
    }

    public static function get_song_detail($id = 0) {
        $result = DB::table('song')->select('*')->where('id',$id)->get();
        
        $result = json_decode(json_encode($result),true);
        
        return !empty($result) ? $result[0]  : [];
    }

    public static function insert_data ($table = '', $insert_data = []) {
        if (!empty($table) && !empty($insert_data)) {
            $result = DB::table($table)->insertGetId($insert_data);

            return $result;
        }
    }
    public static function update_data ($table = '', $update_data = [], $where_column = '', $where_value = '') {
        if (!empty($table) && !empty($update_data)) {
            $affected = DB::table($table)
                        ->where($where_column, $where_value)
                        ->update($update_data);

            return $affected;
        }
    }
}