<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    $param = [
        'id' => '1',
        'name' => 'rese_admin',
        'email' => 'resepj.2022@gmail.com',
        'email_verified_at' => '2022-11-11 11:11:11',
        'password' => '02harusugite',
        'admin' => '1',        
        'remember_token' => '',
        'created_at' => '2022-11-11 11:11:11',
        'updated_at' => '2022-11-11 11:11:11',
    ];
    User::create($param);
}
}
