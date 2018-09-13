<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstamojoPaymentTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('instamojo_payment', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('buyer_email');
            $table->string('buyer_name');
            $table->string('buyer_phone');
            $table->string('currency');
            $table->string('amount');
            $table->string('fees');
            $table->string('longurl');
            $table->string('payment_id');
            $table->string('payment_request_id');
            $table->string('purpose');
            $table->string('shorturl')->nullable();
            $table->string('request_status');
            $table->string('payment_status');
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('instamojo_payment');
    }
}
