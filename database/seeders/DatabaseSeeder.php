<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $tableArray = [
            'users',
            'internet_services',
            'telephony_services',
            'cable_tv_services',
            'tv_channels',
            'tv_plans',
            'programme_schedules',
            'service_packages',
            'suscriptions',
            'package_change_requests',
            'invoices',
        ];

        $this->truncateTables($tableArray);

        \App\Models\User::factory(User::class)->create([
            'name' => 'Reyner Contreras',
            'email' => 'reynercontreras0@gmail.com',
            'id_card' => '26934400',
            'password' => bcrypt('laravel'),
            'is_admin' => true,
        ]);

        $max = 20;
        for ($i = 0; $i < $max; $i++) {
            \App\Models\User::factory()->create();
        }
        $max = 5;
        for ($i = 0; $i < $max; $i++) {
            \App\Models\Services\InternetService::factory()->create();
        }
        $max = 5;
        for ($i = 0; $i < $max; $i++) {
            \App\Models\Services\TelephonyService::factory()->create();
        }
        $max = 5;
        for ($i = 0; $i < $max; $i++) {
            \App\Models\Services\CableTvService::factory()->create();
        }
        $max = 30;
        for ($i = 0; $i < $max; $i++) {
            \App\Models\Services\Tv\TvChannel::factory()->create();
        }
        $max = 40;
        for ($i = 0; $i < $max; $i++) {
            \App\Models\Services\Tv\TvPlan::factory()->create();
        }
        $max = 80;
        for ($i = 0; $i < $max; $i++) {
            \App\Models\Services\Tv\ProgrammeSchedule::factory()->create();
        }
        $max = 10;
        for ($i = 0; $i < $max; $i++) {
            \App\Models\ServicePackage::factory()->create();
        }
        $max = 15;
        for ($i = 0; $i < $max; $i++) {
            \App\Models\Suscription::factory()->create();
        }
        $max = 5;
        for ($i = 0; $i < $max; $i++) {
            \App\Models\PackageChangeRequest::factory()->create();
        }
    }

    protected function addUser(&$tableArray)
    {
        $tableArray[] = 'invoices';
        $tableArray[] = 'package_change_requests';
        $tableArray[] = 'suscriptions';
    }

    protected function addTvService(&$tableArray)
    {
        $tableArray[] = 'programme_schedules';
        $tableArray[] = 'tv_plans';
        $tableArray[] = 'tv_channels';
        $tableArray[] = 'cable_tv_services';
    }

    protected function addServices(&$tableArray)
    {
        $tableArray[] = 'service_packages';
        $tableArray[] = 'telephony_services';
        $tableArray[] = 'internet_services';
        $tableArray[] = 'programme_schedules';
        $tableArray[] = 'tv_plans';
        $tableArray[] = 'tv_channels';
        $tableArray[] = 'cable_tv_services';
    }

    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
