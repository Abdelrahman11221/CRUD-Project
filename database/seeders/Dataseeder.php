<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Department;
use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Dataseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = ['vichels'];
        $category = ['cars'];
        $categoryPrice = ['150000'];
        $item = ['BMW'];
    
        for ($i=0 ; $i<count($department) ; $i++)
        {
            $departments = Department::create([
                'name' => $department[$i]
            ]);
            $categories = Category::create([
                'name' => $category[$i],
                'price' => $categoryPrice[$i],
                'dept_id' => $departments->id
            ]);

            Item::create([
                'name' => $item[$i],
                'cat_id' => $categories->id
            ]);
        }
    }
}
