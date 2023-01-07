<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Lot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(10)->create()->each(function ($category) {
            Lot::factory(8, ['category_id' => $category->id])->create();
        });
    }
}
