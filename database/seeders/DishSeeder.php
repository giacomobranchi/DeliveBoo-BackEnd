<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use Illuminate\Support\Str;


use function Pest\Laravel\json;



class DishSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $ingredients = [
            'Rum',
            'Lime juice',
            'Sugar',
            'Mint',
            'Soda',
        ];
        for ($i = 0; $i < 10; $i++) {
            $dish = new Dish();
            $dish->user_id = '1';
            $dish->name = Str::random(10);
            $dish->description = Str::random(30);
            $dish->ingredients = implode(', ', $ingredients);
            $dish->price = 10;
            $dish->available = true;
            $dish->img = Str::random(10);
            $dish->slug = Str::slug($dish->name, '-');
            $dish->save();
        }
    }
}
