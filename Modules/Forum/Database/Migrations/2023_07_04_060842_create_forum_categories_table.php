<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title', 191);
            $table->string('slug', 191);
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('status_id')->default(1)->constrained('statuses')->onDelete('cascade'); // 1= Active, 2=Inactive
            $table->tinyInteger('is_featured')->default(10); // 10= No, 11=Yes
            $table->tinyInteger('is_course')->default(value: 10); // 10= No, 11=Yes
            $table->longText('filters')->nullable();
            $table->timestamps();
        });

        $footer = \Modules\CMS\Entities\FooterMenu::find(2);
        if ($footer) {
          $forum = [
              'name' => ___('forum.Forum'),
              'link' => url('forum'),
              'status_id' => 1,
          ];

          // Check if links exist and merge the forum link
          $links = json_decode($footer->links) ?? [];
          $footer->links = json_encode(array_merge($links, [$forum]));
          $footer->save();
          cache()->forget('footer_menus');
      } else {
          // Handle the case where the footer menu is not found
          \Log::warning('FooterMenu with ID 2 not found during migration.');
      }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {  
        Schema::dropIfExists('forum_categories');
    }
};
