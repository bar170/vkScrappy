<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListFriendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_friends', function (Blueprint $table) {
            $table->foreignId('target_id')->constrained('targets', 'id')->cascadeOnDelete();
            $table->foreignId('friend_id')->constrained('friends', 'id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_friends');
    }
}
