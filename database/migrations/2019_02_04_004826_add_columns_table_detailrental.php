<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsTableDetailrental extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('realestate_detailsrental',function($table){
            $table->enum('includes_light',['SI','NO']);
            $table->enum('include_water',['SI','NO']);
            $table->enum('status_interest',['NOPAGA','PAGADO','DEBE','PENDIENTE']);
            $table->integer('light_match');
            $table->integer('water_match');
            $table->timestamp('dateRegister');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('realestate_detailsrental',function($table){
            $table->dropColumn('includes_light');
            $table->dropColumn('include_water');
            $table->dropColumn('status_interest');
            $table->dropColumn('light_match');
            $table->dropColumn('water_match');
            $table->dropColumn('dateRegister');
        });
    }
}
