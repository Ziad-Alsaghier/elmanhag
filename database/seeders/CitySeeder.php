<?php

namespace Database\Seeders;

use App\Models\city;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
           for ($i=0; $i <50 ; ) {
            city::factory()
                ->count(50)
                ->create(
                    [
                        'name'=>'ziad',
                        'country_id'=>'1',
                    
                    ]
                );
        }
    }
}
