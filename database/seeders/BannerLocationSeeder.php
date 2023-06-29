<?php

namespace Database\Seeders;

use App\Models\BannerLocation;
use Illuminate\Database\Seeder;

class BannerLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'banner_location' => 'Main',
                'banner_width'    => '1519',
                'banner_height'   => '514'
            ],
            [
                'banner_location' => 'Middle 1',
                'banner_width'    => '610',
                'banner_height'   => '200'
            ],
            [
                'banner_location' => 'Middle 2',
                'banner_width'    => '610',
                'banner_height'   => '200'
            ],
            [
                'banner_location' => 'Middle 3',
                'banner_width'    => '1240',
                'banner_height'   => '198'
            ],
            [
                'banner_location' => 'left 1',
                'banner_width'    => '295',
                'banner_height'   => '672'
            ],
            [
                'banner_location' => 'left 2',
                'banner_width'    => '295',
                'banner_height'   => '673'
            ],
            [
                'banner_location' => 'left 3',
                'banner_width'   => '295',
                'banner_height'    => '673'
            ]
        ];

        BannerLocation::insert($data);
    }
}
