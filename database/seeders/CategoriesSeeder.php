<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = ['min
        uman', 'makanan', 'snack'];

        // Category::factory()->count(5)->create();

        foreach ($datas as  $data) {
                    Category::create([
            "name"=>$data
        ]);
        }
    }
}
