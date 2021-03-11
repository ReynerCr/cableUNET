<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->unique();
            $table->float('price')->unsigned();

            $table->unsignedBigInteger('internet_id')->nullable();
            $table->foreign('internet_id')
                ->references('id')
                ->on('internet_services')
                ->nullOnDelete();

            $table->unsignedBigInteger('telephony_id')->nullable();
            $table->foreign('telephony_id')
                ->references('id')
                ->on('telephony_services')
                ->nullOnDelete();

            $table->unsignedBigInteger('tv_plan_id')->nullable();
            $table->foreign('tv_plan_id')
                ->references('id')
                ->on('tv_plans')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_packages');
    }
}
