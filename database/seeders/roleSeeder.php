<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roleSeeder extends Seeder
{

    public function run()
    {
        DB::table('roles')->truncate();
        $items = [
            [
                'id' => 1,
                'user_id' => 1,
                'permissions' => 'post.create',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        ];
        DB::table('roles')->insert($items);
    }

}
