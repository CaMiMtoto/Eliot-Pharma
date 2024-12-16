<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = [
            'Vitamins and Supplements',
            'Dietary Supplements',
            'Baby Care',
            'Personal Care',
            'Household Supplies',
            'Beauty Tools',
            'Personal Hygiene',
            'Grocery',
            'Snacks',
            'Household Products',
            'Pet Supplies',
            'Bandages',
            'Eye Preparation'
        ];
        $newNames = [];
        if (DB::table('categories')->count() == 0) {
            foreach ($names as $name) {
                $newNames[] = [
                    'name' => $name,
                    'slug' => Str::of($name)->slug() . '-' . uniqid()
                ];
            }
            Category::query()->insert($newNames);
        }
    }
}
