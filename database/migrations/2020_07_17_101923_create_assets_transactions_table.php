<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets_transactions', function (Blueprint $table) {
            $table->uuid('id')->primary()->index();
            $table->unsignedInteger('asset_id')->index();
            $table->uuid('user_id')->index();
            $table->string('transactions_type', 100)->index();
            $table->dateTime('hired_out_at')->nullable()->index();
            $table->dateTime('returned_at')->nullable()->index();
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
        Schema::dropIfExists('assets_transactions');
    }
}
