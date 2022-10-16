<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersVkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_vk', function (Blueprint $table) {
            $table->id();
            $table->string('gender', 45);
            $table->string('name', 100);
            $table->string('birthday', 45)->nullable();
            $table->string('link', 45)->nullable();
            $table->integer('probability_bot')->nullable();
            $table->unsignedBigInteger('status_page_id');
            $table->foreign('status_page_id')->references('id')
                ->on('status_pages')->onDelete('cascade');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')->references('id')
                ->on('locations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_vk');
    }
}
