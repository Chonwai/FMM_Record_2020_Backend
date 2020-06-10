<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatedTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->string('name', 100)->index();
            $table->string('email', 100)->nullable();
            $table->string('contact', 100)->nullable();
            $table->string('staff_number', 100)->nullable();
            $table->string('department', 100)->index()->nullable();
            $table->unsignedInteger('sum')->default(0);
            $table->enum('status', ['internal','external'])->default('external');
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
        Schema::dropIfExists('tenants');
    }
}
