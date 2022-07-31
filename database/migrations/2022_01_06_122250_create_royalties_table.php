<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoyaltiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('royalties', function (Blueprint $table) {
            $table->id();
            $table->string('class');
            $table->string('market');
            $table->string('method');
            $table->string('timber_type');
            // $table->unsignedBigInteger('species_id')->nullable();
            // $table->foreign('species_id')->references('id')->on('species');
            $table->unsignedBigInteger('land_type_id')->nullable();
            $table->foreign('land_type_id')->references('id')->on('land_types');
            $table->unsignedBigInteger('log_size_id')->nullable();
            $table->foreign('log_size_id')->references('id')->on('log_sizes');
            $table->double('amount');
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
        Schema::dropIfExists('royalties');
    }
}
