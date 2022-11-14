<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
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
            'password' => bcrypt("rese_login"),
            'admin' => '1',        
            'manager' => '0',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-11 11:11:11',
            'updated_at' => '2022-11-11 11:11:11',
        ];
        User::create($param);
        $param = [
            'id' => '2',
            'name' => 'manager2',
            'email' => 'resepj2@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:02',
            'password' => bcrypt("rese_login2"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:02',
            'updated_at' => '2022-11-12 11:11:02',
        ];
        User::create($param);
        $param = [
            'id' => '3',
            'name' => 'manager3',
            'email' => 'resepj3@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:03',
            'password' => bcrypt("rese_login3"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:03',
            'updated_at' => '2022-11-12 11:11:03',
        ];
        User::create($param);
        $param = [
            'id' => '4',
            'name' => 'manager4',
            'email' => 'resepj4@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:04',
            'password' => bcrypt("rese_login4"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:04',
            'updated_at' => '2022-11-12 11:11:04',
        ];
        User::create($param);
        $param = [
            'id' => '5',
            'name' => 'manager5',
            'email' => 'resepj5@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:05',
            'password' => bcrypt("rese_login5"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:05',
            'updated_at' => '2022-11-12 11:11:05',
        ];
        User::create($param);
        $param = [
            'id' => '6',
            'name' => 'manager6',
            'email' => 'resepj6@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:06',
            'password' => bcrypt("rese_login6"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:06',
            'updated_at' => '2022-11-12 11:11:06',
        ];
        User::create($param);
        $param = [
            'id' => '7',
            'name' => 'manager7',
            'email' => 'resepj7@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:07',
            'password' => bcrypt("rese_login7"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:07',
            'updated_at' => '2022-11-12 11:11:07',
        ];
        User::create($param);
        $param = [
            'id' => '8',
            'name' => 'manager8',
            'email' => 'resepj8@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:08',
            'password' => bcrypt("rese_login8"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:08',
            'updated_at' => '2022-11-12 11:11:08',
        ];
        User::create($param);
        $param = [
            'id' => '9',
            'name' => 'manager9',
            'email' => 'resepj9@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:09',
            'password' => bcrypt("rese_login9"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:09',
            'updated_at' => '2022-11-12 11:11:09',
        ];
        User::create($param);
        $param = [
            'id' => '10',
            'name' => 'manager10',
            'email' => 'resepj10@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:10',
            'password' => bcrypt("rese_login10"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:10',
            'updated_at' => '2022-11-12 11:11:10',
        ];
        User::create($param);
        $param = [
            'id' => '11',
            'name' => 'manager11',
            'email' => 'resepj11@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:11',
            'password' => bcrypt("rese_login11"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:11',
            'updated_at' => '2022-11-12 11:11:11',
        ];
        User::create($param);
        $param = [
            'id' => '12',
            'name' => 'manager12',
            'email' => 'resepj12@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:12',
            'password' => bcrypt("rese_login12"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:12',
            'updated_at' => '2022-11-12 11:11:12',
        ];
        User::create($param);
        $param = [
            'id' => '13',
            'name' => 'manager13',
            'email' => 'resepj13@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:13',
            'password' => bcrypt("rese_login13"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:13',
            'updated_at' => '2022-11-12 11:11:13',
        ];
        User::create($param);
        $param = [
            'id' => '14',
            'name' => 'manager14',
            'email' => 'resepj14@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:14',
            'password' => bcrypt("rese_login14"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:14',
            'updated_at' => '2022-11-12 11:11:14',
        ];
        User::create($param);
        $param = [
            'id' => '15',
            'name' => 'manager15',
            'email' => 'resepj15@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:15',
            'password' => bcrypt("rese_login15"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:15',
            'updated_at' => '2022-11-12 11:11:15',
        ];
        User::create($param);
        $param = [
            'id' => '16',
            'name' => 'manager16',
            'email' => 'resepj16@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:16',
            'password' => bcrypt("rese_login16"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:16',
            'updated_at' => '2022-11-12 11:11:16',
        ];
        User::create($param);
        $param = [
            'id' => '17',
            'name' => 'manager17',
            'email' => 'resepj17@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:17',
            'password' => bcrypt("rese_login17"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:17',
            'updated_at' => '2022-11-12 11:11:17',
        ];
        User::create($param);
        $param = [
            'id' => '18',
            'name' => 'manager18',
            'email' => 'resepj18@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:18',
            'password' => bcrypt("rese_login18"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:18',
            'updated_at' => '2022-11-12 11:11:18',
        ];
        User::create($param);
        $param = [
            'id' => '19',
            'name' => 'manager19',
            'email' => 'resepj19@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:19',
            'password' => bcrypt("rese_login19"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:19',
            'updated_at' => '2022-11-12 11:11:19',
        ];
        User::create($param);
        $param = [
            'id' => '20',
            'name' => 'manager20',
            'email' => 'resepj20@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:20',
            'password' => bcrypt("rese_login20"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:20',
            'updated_at' => '2022-11-12 11:11:20',
        ];
        User::create($param);
        $param = [
            'id' => '21',
            'name' => 'manager21',
            'email' => 'resepj21@gmail.com',
            'email_verified_at' => '2022-11-12 11:11:21',
            'password' => bcrypt("rese_login21"),
            'admin' => '0',        
            'manager' => '1',        
            'remember_token' => 'Null',
            'created_at' => '2022-11-12 11:11:21',
            'updated_at' => '2022-11-12 11:11:21',
        ];
        User::create($param);

    }
}
