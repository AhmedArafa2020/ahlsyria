<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Event\Entities\Mentoring;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentorings', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->string('phone', 255)->nullable();

            $table->enum('status', Mentoring::AvailableStatuses)->default('idle');
            $table->longText('content')->nullable();
            $table->timestamp("mentoring_date");
            $table->boolean('broadcasted')->default(false);
            $table->tinyInteger('reviews')->default(0);
            $table->uuid('reference')->unique();
            $table->timestamps();

            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // how ask for mentorings
            $table->foreignId('mentor_id')->constrained('users')->onDelete('cascade'); // mentor user id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mentorings');
    }
};
