<?php

namespace Database\Seeders;

use App\Models\DeliveryTimeType;
use Illuminate\Database\Seeder;

class DeliveryTimeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['delivery_time_type' => 'minutes'],
            ['delivery_time_type' => 'hours'],
            ['delivery_time_type' => 'days']
        ];

        DeliveryTimeType::insert($data);
    }
}
