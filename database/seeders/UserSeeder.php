<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin= User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role'=>'admin',
        ]);

        $driver= User::create([
            'name' => 'azeem',
            'email' => 'azeem@gmail.com',
            'password' => bcrypt('12345678'),
            'role'=>'driver',
            'ven_number'=>'3334',
            'licence_number'=>'12345',
        ]);
    }
}
