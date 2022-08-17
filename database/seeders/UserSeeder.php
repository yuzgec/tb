<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data =
            [
                [
                    'name' => 'Aytaç Omaç',
                    'email' => 'aytac@kuatek.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$F1OTgNYzednClB2SNUSQteW.fE8lr63ewu.VV0ZzmZ.HHO.yIWnQa',
                    'remember_token' => Str::random(10),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'name' => 'Olcay Yüzgeç',
                    'email' => 'olcayy@gmail.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$Sibwr1vkCSvfjo4e9ryHA.SLy9y0EQ8oG9iUPLjh.zMIjugTOPRjS', // password
                    'remember_token' => Str::random(10),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()

                ]
            ];
        DB::table('users')->insert($data);
    }
}
