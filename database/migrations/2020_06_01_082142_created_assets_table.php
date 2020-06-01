<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name', 100)->index()->nullable();
            $table->string('description', 100)->nullable();
            $table->string('category', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->dateTime('acquired_at')->nullable();
            $table->float('purchase_price')->nullable()->default(0);
            $table->unsignedInteger('current_value')->nullable()->default(0);
            $table->string('location', 100)->nullable();
            $table->string('manufacturer', 100)->nullable();
            $table->string('model', 100)->nullable();
            $table->string('comments', 100)->nullable();
            $table->string('owner', 100)->nullable();
            $table->string('asset_id', 20)->index()->nullable();
            $table->string('attachments', 100)->nullable();
            $table->dateTime('retired_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
