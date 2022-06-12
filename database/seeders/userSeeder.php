<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->truncate();
        $items = [
            [
                'id' => 1,
                'username' => 'admin',
                'password' => bcrypt('password'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        DB::table('users')->insert($items);
    }

}
