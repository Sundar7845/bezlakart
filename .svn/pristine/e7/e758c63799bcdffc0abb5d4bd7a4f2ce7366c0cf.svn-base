<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoldPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gold_plans', function (Blueprint $table) {
            $table->id();
            $table->string('plan_name')->nullable();
            $table->unsignedBigInteger('plan_type_id');
            $table->foreign('plan_type_id')->references('id')->on('plan_types');
            $table->string('gold_type')->nullable();
            $table->integer('gold_weight')->nullable();
            $table->integer('plan_installment')->nullable();
            $table->double('plan_amount', 8, 2)->default(0);
            $table->double('total_plan_amount', 8, 2)->default(0);
            $table->integer('is_active')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gold_plans');
    }
}
