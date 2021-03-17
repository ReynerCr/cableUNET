<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UseFkAsPrimaryKeysInPackageChangeRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_change_requests', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->primary(['subscription_id', 'new_sp_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_change_requests', function (Blueprint $table) {
            $table->id()->first();
            $table->dropPrimary(['subscription_id', 'new_sp_id']);
        });
    }
}
