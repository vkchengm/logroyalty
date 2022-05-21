<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permit_details', function (Blueprint $table) {
            $table->id();
            $table->string('log_no');
            $table->double('length', 8, 2);
            $table->double('diameter_1', 8, 2);
            $table->double('diameter_2', 8, 2);
            $table->double('mean', 8, 2)->nullable();
            $table->string('defect_symbol')->nullable();
            $table->double('defect_length', 8, 2);
            $table->double('defect_diameter', 8, 2);
            $table->double('vol', 8, 2)->nullable();
            $table->double('royalty', 8, 2)->nullable();
            $table->double('premium', 8, 2)->nullable();
            $table->double('amount', 8, 2)->nullable();
            $table->unsignedBigInteger('permit_id')->nullable();
            $table->foreign('permit_id')->references('id')->on('permits')->onDelete('cascade');
            $table->unsignedBigInteger('species_id')->nullable();
            $table->foreign('species_id')->references('id')->on('species');
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
        Schema::dropIfExists('permit_details');
    }
}
