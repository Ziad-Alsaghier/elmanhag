<?php

namespace Database\Seeders;

use App\Models\country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i=0; $i <50 ; ) {
            country::factory()
                ->count(50)
                ->create(
                    [
                        'name'=>'Egypt',
                        'status'=>'1',
                    ]
                );
                
        }
    }
}
