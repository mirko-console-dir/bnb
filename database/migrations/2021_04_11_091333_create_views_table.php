<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('views', function (Blueprint $table) {
            // $table->id();
            // $table->date('date');
            // $table->unsignedBigInteger('apartment_id');
            // $table->foreign('apartment_id')->references('id')->on('apartments');
            // $table->string('address_ip', 50);
            // $table->increments('view_counter');
            
            // $table->timestamps();

            $table->bigIncrements('id');
            $table->unsignedBigInteger('apartment_id');
            $table->foreign('apartment_id')->references('id')->on('apartments')->onDelete('cascade');
            $table->string('ip_address');
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
        Schema::dropIfExists('views');
    }
}
