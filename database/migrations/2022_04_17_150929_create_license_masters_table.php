<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenseMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('license_masters', function (Blueprint $table) {
            $table->id();
            $table->string('account_no')->nullable();
            $table->string('license_no')->nullable();
            $table->string('licensee_name')->nullable();
            $table->string('coupe_no')->nullable();
            $table->string('land_type')->nullable();
            $table->date('issued_date')->nullable();
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
        Schema::dropIfExists('license_masters');
    }
}
