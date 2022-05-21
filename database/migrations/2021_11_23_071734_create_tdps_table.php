<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTdpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tdps', function (Blueprint $table) {
            $table->id();
            $table->string('license_no');
            $table->string('logging_method');
            $table->string('market');
            $table->string('licensee_ac_no');
            $table->string('description');

            $table->string('place_of_scaling');
            $table->date('scaled_date');  
            // $table->timestamp('scaled_date');  
            $table->string('name_of_scaler');
            $table->string('owner_of_property_hammer_mark');
            $table->string('registered_property_hammer_mark');
            $table->string('status');
    
            $table->timestamps();

            $table->unsignedBigInteger('created_by_user_id')->nullable();
            $table->foreign('created_by_user_id')->references('id')->on('users');
            // $table->unsignedBigInteger('district_id')->nullable();
            // $table->foreign('district_id')->references('id')->on('districts');
            // $table->unsignedBigInteger('land_type_id')->nullable();
            // $table->foreign('land_type_id')->references('id')->on('landtypes');
            $table->unsignedBigInteger('dfo_id')->nullable();
            $table->foreign('dfo_id')->references('id')->on('users');
            $table->unsignedBigInteger('kppm_id')->nullable();
            $table->foreign('kppm_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tdps');
    }
}
