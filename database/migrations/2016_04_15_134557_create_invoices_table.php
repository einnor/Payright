<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('invoices', function (Blueprint $table) {
//            $table->increments('id');
//            $table->integer('user_id')->references('id')->on('users')->onDelete('cascade');
//            $table->integer('client_id')->references('id')->on('clients')->onDelete('cascade');
//            $table->string('particular');
//            $table->decimal('amount', 6, 2);
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::drop('invoices');
    }
}
