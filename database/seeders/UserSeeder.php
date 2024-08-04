<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // This Seeder About Data Users Admin or Student

        for ($i=0; $i <50 ; ) {
            User::factory()
                ->count(1)
                ->create(
                    [
                        'firstName'=>'ziad',
                        'lastName'=>'Mohamed',
                        'email'=>'admin@gmail.com',
                        'phone'=>'01099475854',
                        'type'=>'admin',
                        'password'=>'123',
                        'country_id'=>'1',
                        'city_id'=>'1',
                        'image'=>'admin/default.png',
                        'status'=>'1',
                    ]
                );
        };
    }
}
