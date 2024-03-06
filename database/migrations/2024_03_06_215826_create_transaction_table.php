<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->id('id');
            $table->integer("user_id");
            $table->integer("qrcode_owner_id")->nullable();
            $table->integer("qrcode_id");
            $table->string("payment_method")->nullable();
            $table->longText("message")->nullable();
            $table->integer("amount", 10,4);
            $table->integer("status")->default("initiated");
            $table->timestemps();
            $table->softDeletes();



           
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
        Schema::drop('transaction');
    }
};
