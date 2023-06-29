<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('mobile')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('display_name')->nullable();
            $table->integer('role_id')->nullable();
            $table->string('social_id')->nullable();
            $table->string('login_medium')->nullable();
            $table->integer('is_web')->default(0);
            $table->string('user_img_path')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('mobile_verified_at')->nullable();
            $table->integer('is_active')->default(1);
            $table->integer('otp')->nullable();
            $table->timestamp('otp_expiry')->nullable();
            $table->timestamp('email_expiry')->nullable();
            $table->string('referral_code')->nullable();
            $table->integer('is_approved')->default(1);
            $table->string('device_id')->nullable();
            $table->string('fcm_token')->nullable();
            $table->integer('wallet_points')->default(0);
            $table->integer('gold_wallet')->default(0);
            $table->integer('cash_wallet')->default(0);
            $table->float('closing_balance', 8, 2)->default(0);
            $table->string('account_holder_name')->nullable();
            $table->string('account_no')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('branch_name')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->rememberToken();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });

        Artisan::call('db:seed', [
            '--class' => 'UserSeeder'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
