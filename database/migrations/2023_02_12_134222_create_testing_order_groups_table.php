<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestingOrderGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testing_order_groups', function (Blueprint $table) {
            $table->unsignedBigInteger('testing_order_id');
            //$table->foreign('testing_order_id')->references('id')->on('testing_orders');
            $table->unsignedBigInteger('group_id');
            //$table->foreign('group_id')->references('id')->on('testing_groups');
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
        Schema::dropIfExists('testing_order_groups');
    }
}
