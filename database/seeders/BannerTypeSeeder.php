<?php

namespace Database\Seeders;

use App\Models\BannerType;
use Illuminate\Database\Seeder;

class BannerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['banner_type' => 'store_wise'],
            ['banner_type' => 'product_wise']
        ];

        BannerType::insert($data);
    }
}
