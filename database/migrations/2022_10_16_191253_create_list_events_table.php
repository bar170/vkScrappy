<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_events', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained('events', 'id')->cascadeOnDelete();
            $table->foreignId('target_id')->constrained('targets', 'id')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_events');
    }
}
