<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\SongMaintenanceModel;

class SongMaintenancecontroller extends Controller
{

    public function get_song_list (Request $request) {
        
        $list = SongMaintenanceModel::get_song_list();
        $list_array = [];

        foreach ($list as $key => $value) {
            $list_array[] = [
                'title'     => $value['title'],
                'artist'    => $value['artist'],
                'lyrics'    => $value['lyrics'],
                'action'    => '
                    <a href="#" class="btn btn-edit" value="' . $value['id'] . '"><i class="fas fa-edit fa-lg"></i></a><br/>
                    <a href="#" class="btn btn-delete" value="' . $value['id'] . '"><i class="fas fa-trash fa-lg "></i></a>
                '
            ];
        }

        return json_encode(['list' => $list_array]);
    }

    public function get_song_detail (Request $request) {
        $id = $request->id;

        $result = SongMaintenanceModel::get_song_detail($id);

        return json_encode([
            'title'     => $result['title'],
            'artist'    => $result['artist'],
            'lyrics'    => $result['lyrics'],
        ]);
    }

    public function save_song (Request $request){
        // get data from ajax
        $id         = $request->id;
        $title      = $request->title;
        $artist     = $request->artist;
        $lyrics     = $request->lyrics;
        $is_insert  = $request->is_insert;

        if ($is_insert) { // check if the data is to be insert or update

            // create array for the data to be inserted
            $insert_data = [
                'title'         => $title,
                'artist'        => $artist,
                'lyrics'        => $lyrics,
                'created_at'    => date('Y-m-d H:i:s')
            ];
            
            $result = SongMaintenanceModel::insert_data('song',$insert_data);
        }
        else{
            // create array for the data to be inserted
            $update_date = [
                'title'         => $title,
                'artist'        => $artist,
                'lyrics'        => $lyrics,
                'updated_at'    => date('Y-m-d H:i:s')
            ];
            
            $result = SongMaintenanceModel::update_data('song',$update_date,'id',$id);
        }

    }

    public function delete_song (Request $request){
        $id = $request->id;

        $delete_data = [
            'deleted_at' => date('Y-m-d H:i:s')
        ];

        SongMaintenanceModel::update_data('song',$delete_data,'id',$id);
    }
}