<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('transactions');
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('account_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $table->string('tran_id')->unique();
            $table->dateTime('transaction_time');
            $table->string('transaction_type');
            $table->string('transaction_category');
            $table->string('description');
            $table->decimal('amount');
            $table->string('currency', 3);
            $table->string('merchant_name')->nullable();
            $table->string('provider_transaction_id')->nullable();
            $table->text('provider_transaction_category')->nullable();
            $table->string('version_two_id')->nullable();
            $table->string('running_balance_currency', 3)->nullable();
            $table->decimal('running_balance_amount')->nullable();
            $table->text('transaction_classification')->nullable();
            $table->string('data_source');
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
        Schema::dropIfExists('transactions');
    }
}
