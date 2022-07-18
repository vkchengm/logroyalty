<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHammerMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hammer_marks', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('number');
            $table->string('employee_id');
            $table->string('employee_name');
            $table->string('ic')->nullable();
            $table->string('old_ic')->nullable();
            $table->string('position')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->string('folio_borang')->nullable();
            $table->string('status')->nullable();
            $table->date('deactivate_date')->nullable();
            $table->string('deactivate_reason')->nullable();
            $table->string('folio_surat')->nullable();
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
        Schema::dropIfExists('hammer_marks');
    }
}
