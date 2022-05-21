    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('fo_id')->nullable();
            $table->foreign('fo_id')->references('id')->on('users');
            $table->unsignedBigInteger('ppw_id')->nullable();
            $table->foreign('ppw_id')->references('id')->on('users');
            $table->unsignedBigInteger('tppw_id')->nullable();
            $table->foreign('tppw_id')->references('id')->on('users');
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
        Schema::dropIfExists('regions');
    }
}
