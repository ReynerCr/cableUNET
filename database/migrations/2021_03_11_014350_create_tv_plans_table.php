<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTvPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tv_plans', function (Blueprint $table) {
            $table->unsignedBigInteger('tv_channel_id');
            $table->foreign('tv_channel_id')
                ->references('id')
                ->on('tv_channels')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('cable_tv_service_id');
            $table->foreign('cable_tv_service_id')
                ->references('id')
                ->on('cable_tv_services')
                ->cascadeOnDelete();

            $table->primary(['tv_channel_id', 'cable_tv_service_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tv_plans');
    }
}
