<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [

            'Latest Jobs',
            'Admit Card',
            'Results',
            'Answer Key',
            'Syllabus',
            'Admissions'

        ];

        foreach ($categories as $category) {

            Category::create([

                'name' => $category,

                'slug' => strtolower(str_replace(' ', '-', $category))

            ]);

        }
    }
}