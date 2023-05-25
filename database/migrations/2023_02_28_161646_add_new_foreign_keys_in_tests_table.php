<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewForeignKeysInTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->bigInteger('test_lang_id')->unsigned()->index()->change();
            $table->foreign('test_lang_id')->references('id')->on('langs')->onDelete('cascade');
            $table->bigInteger('test_category_type_id')->unsigned()->index()->change();
            $table->foreign('test_category_type_id')->references('id')->on('test_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tests', function (Blueprint $table) {
            //
        });
    }
}
