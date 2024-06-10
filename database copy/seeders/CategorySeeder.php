<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Test Category',
            'description' => 'Sample Category',
            'parent_id' => 0,
            'status' => 1
        ]);
    }
}
