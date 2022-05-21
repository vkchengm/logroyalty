<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permit_charges', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('unit')->nullable();
            $table->string('description')->nullable();
            $table->double('amount', 8, 2)->nullable();
            $table->double('total', 8, 2)->nullable();

            $table->timestamps();

            $table->unsignedBigInteger('permit_id')->nullable();
            $table->foreign('permit_id')->references('id')->on('permits')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permit_charges');
    }
}
