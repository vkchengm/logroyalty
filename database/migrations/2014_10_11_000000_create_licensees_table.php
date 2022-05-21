<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenseesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('licensees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type'); //company individual group
            $table->string('contact_no')->nullable();
            $table->string('address_1')->nullable();
            $table->string('address_2')->nullable();

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
        Schema::dropIfExists('licensees');
    }
}
