<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageChangeRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_change_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('suscription_id');
            $table->foreign('suscription_id')
                ->references('id')
                ->on('suscriptions')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('new_service_package_id');
            $table->foreign('new_service_package_id')
                ->references('id')
                ->on('service_packages')
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
        Schema::dropIfExists('package_change_requests');
    }
}
