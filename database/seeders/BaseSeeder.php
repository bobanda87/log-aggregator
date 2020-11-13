<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

/**
 * Class BaseSeeder
 *
 * @package Database\Seeders
 */
class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param string $tableName
     */
    public function import(string $tableName)
    {
        \DB::table($tableName)->delete();

        $json = Storage::get("data/$tableName.json");
        $data = json_decode($json);

        foreach ($data as $object) {
            \DB::table($tableName)->insert((array) $object);
        }
    }
}
