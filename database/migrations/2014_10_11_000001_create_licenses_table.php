<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable(); //Long Term, SFMLA, Form 2B, Occupational Permit, Form 1.
            $table->unsignedBigInteger('licensee_id')->nullable();
            $table->foreign('licensee_id')->references('id')->on('licensees');
            $table->date('start_date')->nullable();  
            $table->date('expiry_date')->nullable();  
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
        Schema::dropIfExists('licenses');
    }
}
