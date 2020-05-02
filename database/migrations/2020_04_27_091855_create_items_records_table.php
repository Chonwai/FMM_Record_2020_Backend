<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_records', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->unsignedInteger('record_id')->index();
            $table->integer('item');
            $table->string('assets_model', 255)->nullable();
            $table->string('assets_no', 255)->nullable();
            $table->string('place_of_use', 255)->nullable()->index();
            $table->string('returned_by', 255)->nullable()->index();
            $table->dateTime('returned_at')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->foreign('record_id')->references('id')->on('records');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_records');
    }
}
