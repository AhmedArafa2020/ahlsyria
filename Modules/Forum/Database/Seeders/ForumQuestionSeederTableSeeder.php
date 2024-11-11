<?php

namespace Modules\Forum\Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ForumQuestionSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            $title = $faker->sentence;
            $slug = Str::slug($title);
            $question = $faker->paragraphs(3, true);
            $forumCategoryId = rand(1, 5);
            $createdBy = rand(1, 4);
            $updatedBy = rand(1, 4);
            $statusId = rand(1, 2);
            $isFeatured = rand(10, 11);

            DB::table('forum_questions')->insert([
                'title' => $title,
                'slug' => $slug,
                'question' => $question,
                'forum_category_id' => $forumCategoryId,
                'created_by' => $createdBy,
                'updated_by' => $updatedBy,
                'status_id' => $statusId,
                'is_featured' => $isFeatured ? 11 : 10,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
