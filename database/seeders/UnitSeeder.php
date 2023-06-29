<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['unit_name' => 'kilo'],
            ['unit_name' => 'gram'],
            ['unit_name' => 'pcs']
        ];

        Unit::insert($data);
    }
}
