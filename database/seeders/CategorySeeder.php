<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public $categories = [
        [
            'id' => 1,
            'name' => 'Cafe',
            'description' => '',
        ],
        [
            'id' => 2,
            'name' => 'Chicken',
            'description' => '',
        ],
    ];

 private function getCategories(): array
    {
        $categories = [];
        for ($i = 1; $i <= 1000; $i++) {
            $categories[] = [
                
                'name' => 'Category ' . $i,
                'description' => 'Description for Category ' . $i,
            ];
        }
        return $categories;
    }


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->getCategories() as $category) {
            Category::create($category);
        }
    }
}

