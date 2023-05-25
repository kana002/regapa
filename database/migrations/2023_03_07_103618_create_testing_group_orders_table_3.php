<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestingGroupOrdersTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::dropIfExists('testing_group_orders');
        /*Schema::table('testing_group_orders', function (Blueprint $table) {
            $table->bigInteger('group_id')->unsigned()->index()->change();
            $table->foreign('group_id')->references('id')->on('testing_groups')->onDelete('cascade');
            $table->bigInteger('testing_order_id')->unsigned()->index()->change();
            $table->foreign('testing_order_id')->references('id')->on('testing_orders')->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('testing_group_orders');
    }
}
