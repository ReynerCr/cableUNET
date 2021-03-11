<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCableTvServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cable_tv_services', function (Blueprint $table) {
            $table->unsignedBigInteger('channel_id');
            $table->foreign('channel_id')
                ->references('id')
                ->on('tv_channels')
                ->cascadeOnDelete();
            $table->unsignedBigInteger('tv_plan_id');

            $table->foreign('tv_plan_id')
                ->references('id')
                ->on('tv_plans')
                ->cascadeOnDelete();
            $table->primary(['channel_id', 'tv_plan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cable_tv_services');
    }
}
