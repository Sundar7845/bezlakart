<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreateBannerLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_locations', function (Blueprint $table) {
            $table->id();
            $table->string('banner_location')->nullable();
            $table->string('banner_height')->nullable();
            $table->string('banner_width')->nullable();
        });

        Artisan::call('db:seed', [
            '--class' => 'BannerLocationSeeder'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banner_locations');
    }
}
