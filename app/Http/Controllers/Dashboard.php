<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\SongMaintenanceModel;

class Dashboard extends Controller
{
    public function index() {
        $song_list = SongMaintenanceModel::get_song_list();
        
        return view('dashboard',['song_list' => $song_list]);
    }
}