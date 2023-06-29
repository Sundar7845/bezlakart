<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['social_media_name' => 'Facebook'],
            ['social_media_name' => 'Instagram'],
            ['social_media_name' => 'Twitter'],
            ['social_media_name' => 'LinkedIn'],
            ['social_media_name' => 'Pinterest'],
            ['social_media_name' => 'Youtube']
        ];

        SocialMedia::insert($data);
    }
}
