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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('emailDon');
            $table->bigInteger('cardNo');
            $table->integer('securityCode');
            $table->date('expirationDate');
            $table->string('cardholderName');
            $table->string('billingAddress');
            $table->integer('zip');
            $table->integer('donationAmount');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
};
