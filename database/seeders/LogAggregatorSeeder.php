<?php

namespace Database\Seeders;

/**
 * Class LogAggregatorSeeder
 */
class LogAggregatorSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        parent::import('log_aggregators');
    }
}
