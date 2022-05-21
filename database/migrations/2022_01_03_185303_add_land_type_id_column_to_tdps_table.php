<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLandTypeIdColumnToTdpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tdps', function (Blueprint $table) {
            $table->unsignedBigInteger('land_type_id')->nullable();
            $table->foreign('land_type_id')->references('id')->on('land_types');            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tdps', function (Blueprint $table) {
            //
        });
    }
}
