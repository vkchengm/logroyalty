<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permits', function (Blueprint $table) {
            $table->id();
            $table->string('license_no');
            $table->string('coupe_no')->nullable();
            $table->string('logging_method');
            $table->string('market');
            $table->string('licensee_ac_no')->nullable();
            $table->string('description')->nullable();

            $table->string('place_of_scaling');
            $table->date('scaled_date')->nullable();  
            $table->string('name_of_scaler');
            $table->string('owner_of_property_hammer_mark');
            $table->string('registered_property_hammer_mark');
            $table->string('buyer')->nullable();
            $table->string('status');

            $table->string('receipt_no')->nullable();
            $table->date('payment_date')->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_to')->nullable();
            $table->double('billed_vol', 8, 2)->nullable();
            $table->double('billed_amount', 8, 2)->nullable();
    
            $table->timestamps();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('dfo_id')->nullable();
            $table->foreign('dfo_id')->references('id')->on('users');
            $table->unsignedBigInteger('kppm_id')->nullable();
            $table->foreign('kppm_id')->references('id')->on('users');
            $table->unsignedBigInteger('fo_id')->nullable();
            $table->foreign('fo_id')->references('id')->on('users');

            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts');            
            $table->unsignedBigInteger('land_type_id')->nullable();
            $table->foreign('land_type_id')->references('id')->on('land_types');            
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permits');
    }
}
