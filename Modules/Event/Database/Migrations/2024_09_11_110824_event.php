<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Event\Entities\Event;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->string('slug', 255)->unique();
            $table->string('address', 255)->nullable();
            $table->tinyInteger('broadcast_counter')->default(0);
            $table->enum('status', Event::AvailableStatuses)->default('active');
            $table->longText('content')->nullable();
            $table->text('short_description')->nullable();
            $table->boolean('broadcasted')->default(false);

            $table->foreignId('image_id')->nullable()->constrained('uploads')->onDelete('cascade');
            $table->dateTime("start_date")->nullable();
            $table->dateTime("end_date")->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->foreignId('deleted_by')->nullable()->constrained('users')->onDelete('cascade');

            $table->timestamps();

            //index
            $table->index(['title', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
