<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permit_logs', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('action')->nullable();
            $table->string('remark')->nullable();
            $table->string('system_info')->nullable();
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
        Schema::dropIfExists('permit_logs');
    }
}
