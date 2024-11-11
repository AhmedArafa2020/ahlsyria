<?php

namespace Modules\Forum\Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ForumAnswerSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $forumQuestionIds = DB::table('forum_questions')->pluck('id')->toArray();

        foreach ($forumQuestionIds as $questionId) {
            for ($i = 0; $i < rand(1, 5); $i++) {
                $answer = $faker->paragraphs(2, true);
                $statusId = 1;
                $createdBy = rand(1, 4);
                $updatedBy = rand(1, 4);

                DB::table('forum_answers')->insert([
                    'forum_question_id' => $questionId,
                    'answer' => $answer,
                    'status_id' => $statusId,
                    'created_by' => $createdBy,
                    'updated_by' => $updatedBy,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
