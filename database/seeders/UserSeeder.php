<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert(
            [
                [
                    'id_user' => '01he5rnpxx85a0ebetstzf5nba',
                    'nama_user' => 'admin',
                    'username' => 'admin',
                    'email_user' => 'admin@gmail.com',
                    'password_user' => '$2y$10$q34Q0okiCOrLpSSADBrru.Oq/PJ2h1WQTqcfQjOB.JWzS9Ib7oIfq',
                    'foto_user' => '2.jpg',
                    'identitas_user' => 'cXt883jRTDiYH8kHS8Z3.png',
                    'role_user' => 0,
                    'status_user' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'id_user' => '01he5rrexj1zn3j8cdctb7jrp1',
                    'nama_user' => 'pelanggan',
                    'username' => 'pelanggan',
                    'email_user' => 'pelanggan@gmail.com',
                    'password_user' => '$2y$10$m/h1XbTIymMVPblQ8FrHYOPsiqhThPFnVu2ul17ty8hIOnqAmnpkG',
                    'foto_user' => '1.jpg',
                    'identitas_user' => 'HcsObW9JIW5aZTtCHU1U.PNG',
                    'role_user' => 1,
                    'status_user' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            ]
        );
    }
}
