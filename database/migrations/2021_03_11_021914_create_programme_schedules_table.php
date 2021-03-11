<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammeSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programme_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tv_channel_id');
            $table->timestamp('starts');
            $table->string('tv_show_name', 50);
            $table->foreign('tv_channel_id')
                ->references('id')
                ->on('tv_channels')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programme_schedules');
    }
}
