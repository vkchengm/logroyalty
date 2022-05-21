<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenseAccCoupesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('license_acc_coupes', function (Blueprint $table) {
            $table->id();
            $table->string('account_no');
            $table->string('coupe_no')->nullable();
            $table->unsignedBigInteger('license_id')->nullable();
            $table->foreign('license_id')->references('id')->on('licenses');
            $table->date('issued_date')->nullable();  
            $table->date('start_date')->nullable();  
            $table->date('expiry_date')->nullable();  
            $table->string('land_type')->nullable();

            // $table->string('license_type')->nullable();
            // $table->string('license_no')->nullable();
            // $table->string('licensee_ac_no')->nullable();

            // $table->unsignedBigInteger('district_id')->nullable();
            // $table->foreign('district_id')->references('id')->on('districts');            

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
        Schema::dropIfExists('license_acc_coupes');
    }
}
