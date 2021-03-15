<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternetServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internet_services', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->unique();
            $table->integer('download_speed')->unsigned();
            $table->integer('upload_speed')->unsigned();
            $table->float('price')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internet_services');
    }
}
