<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('ic')->nullable();
            $table->string('job_title')->nullable();
            $table->string('status')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('type')->nullable();

            $table->unsignedBigInteger('licensee_id')->nullable();
            $table->foreign('licensee_id')->references('id')->on('licensees');
            // $table->unsignedBigInteger('district_id')->nullable();
            // $table->foreign('district_id')->references('id')->on('districts');

            $table->string('mobile_no')->nullable();
            $table->string('password');
            $table->boolean('is_activated')->nullable()->default(false);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
