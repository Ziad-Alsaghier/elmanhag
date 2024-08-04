<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            User::class,
        ]);
                 User::factory()
                ->count(20)
                ->create(
                    [
                        'firstName'=>'ziad',
                        'lastName'=>'Mohamed',
                        'email'=>fake()->random()->unique()->safeEmail(),
                        'phone'=>'01099475854',
                        'type'=>'admin',
                        'password'=>'12345678',
                        'parent_name'=>'Mohamed',
                        'parent_phone'=>'5530482',
                        'language'=>'1',
                        'image'=>'admin/default.png',
                        'status'=>'1',
                    ]
                );
    }
}
