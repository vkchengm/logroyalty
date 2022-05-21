<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTdpLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tdp_logs', function (Blueprint $table) {
            $table->id();
            $table->string('log_no');
            $table->double('length', 8, 2);
            $table->double('diameter_1', 8, 2);
            $table->double('diameter_2', 8, 2);
            $table->double('mean', 8, 2);
            $table->string('defect_symbol');
            $table->double('defect_length', 8, 2);
            $table->double('defect_diameter', 8, 2);
            $table->unsignedBigInteger('tdp_id')->nullable();
            $table->foreign('tdp_id')->references('id')->on('tdps');
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
        Schema::dropIfExists('tdp_logs');
    }
}
