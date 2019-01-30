<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRealestateMeters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realestate_meters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_owner');
            $table->string('internalcode');
            $table->enum('company',['SAGUAPAB','CRE','OTROS']);
            $table->enum('type',['LUZ','AGUA','OTROS']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('realestate_meters');
    }
}
