<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->uuid('id')->index()->primary();
            $table->string('staff_or_student_number', 100)->index()->unique();
            $table->string('email')->unique()->index();
            $table->string('password_hash', 255);
            $table->string('name', 100)->index();
            $table->string('contact', 100)->nullable();
            $table->dateTime('last_actived_at');
            $table->boolean('is_admin')->default(false);
            $table->unsignedInteger('records_count')->default(0);
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
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
