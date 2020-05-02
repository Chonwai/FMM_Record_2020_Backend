<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('taken_by', 100)->nullable();
            $table->dateTime('taken_at')->nullable();
            $table->string('staff_number', 100)->nullable()->index();
            $table->string('department', 100)->nullable()->index();
            $table->string('contact', 100)->nullable()->index();
            $table->enum('status', ['internal', 'external'])->nullable()->index();
            $table->boolean('is_returned')->nullable()->index();
            $table->string('remark', 255)->nullable()->index();
            $table->string('hired_out_by', 100)->nullable()->index();
            $table->dateTime('hired_out_at')->nullable();
            $table->string('returned_by', 100)->nullable()->index();
            $table->dateTime('returned_at')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
