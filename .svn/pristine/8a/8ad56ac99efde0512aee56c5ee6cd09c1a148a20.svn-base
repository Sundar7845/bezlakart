<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailConfigSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_config_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0);
            $table->string('mailer_name')->nullable();
            $table->string('host')->nullable();
            $table->string('driver')->nullable();
            $table->integer('port')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('encryption')->nullable();
            $table->string('password')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_config_settings');
    }
}
