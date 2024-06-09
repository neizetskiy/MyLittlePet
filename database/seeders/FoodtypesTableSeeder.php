<?php

namespace Database\Seeders;

use App\Models\Foodtype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodtypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Foodtype::query()->create([
            'name'=>'Сухой',
        ]);

        Foodtype::query()->create([
            'name'=>'Влажный',
        ]);
    }
}
