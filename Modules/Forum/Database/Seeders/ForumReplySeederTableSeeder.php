<?php

namespace Modules\Forum\Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class ForumReplySeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $forumAnswerIds = DB::table('forum_answers')->pluck('id')->toArray();

        foreach ($forumAnswerIds as $answerId) {
            for ($i = 0; $i < rand(1, 3); $i++) {
                $comment = $faker->sentence();
                $statusId = 1;
                $createdBy = rand(1, 4);

                DB::table('forum_replies')->insert([
                    'forum_answer_id' => $answerId,
                    'comment' => $comment,
                    'status_id' => $statusId,
                    'created_by' => $createdBy,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
