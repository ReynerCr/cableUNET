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

            $table->unsignedBigInteger('internet_service_id')->nullable();
            $table->foreign('internet_service_id')
                ->references('id')
                ->on('internet_services')
                ->nullOnDelete();

            $table->unsignedBigInteger('telephony_service_id')->nullable();
            $table->foreign('telephony_service_id')
                ->references('id')
                ->on('telephony_services')
                ->nullOnDelete();

            $table->unsignedBigInteger('cable_tv_service_id')->nullable();
            $table->foreign('cable_tv_service_id')
                ->references('id')
                ->on('cable_tv_services')
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
