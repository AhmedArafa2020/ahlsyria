<?php

namespace Modules\Forum\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Forum\Database\Seeders\ForumCategorySeeder;

class ForumDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (@Session()->get('temp_data') || env('APP_TEST')) {
            $this->call([
                ForumCategorySeeder::class,
                ForumQuestionSeederTableSeeder::class,
                ForumAnswerSeederTableSeeder::class,
                ForumReplySeederTableSeeder::class,
            ]);
        }

    }
}
