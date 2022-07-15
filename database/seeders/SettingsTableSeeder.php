<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'name' => 'Título do Site',
                'content' => env('APP_NAME'),
                'user_id' => 1,
                'created_at' => new DateTime('now'),
            ],
            [
                'name' => 'Subtítulo do Site',
                'content' => env('APP_SUBTITLE'),
                'user_id' => 1,
                'created_at' => new DateTime('now'),
            ],
            [
                'name' => 'Contato',
                'content' => env('ADMIN_EMAIL'),
                'user_id' => 1,
                'created_at' => new DateTime('now'),
            ],
        ]);
    }
}
