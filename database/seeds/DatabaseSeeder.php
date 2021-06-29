<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $db = DB::table('song');

        for($index = 0; $index < 50; $index++){
            $db->insert([
                'title'         => Str::random(10),
                'artist'        => Str::random(10),
                'lyrics'        => Str::random(10),
                'created_at'    => date('Y-m-d H:i:s')
            ]);
        }
    }
}
