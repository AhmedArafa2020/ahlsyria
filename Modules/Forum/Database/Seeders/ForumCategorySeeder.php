<?php

namespace Modules\Forum\Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Modules\Forum\Entities\ForumCategory;

class ForumCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            "Web Development",
            "Web Design",
            "App Development",
            "App Design",
            "UI/UX",
        ];

        $categoriesArray =[];
        foreach($categories as $category){
            $categoriesArray[] =[
                'title' => $category,
                'slug' => Str::slug($category),
                'created_by' => 1,
                'status_id' => 1,
                'created_at' => now(),
            ];
        }

        ForumCategory::insert($categoriesArray);
    }
}
