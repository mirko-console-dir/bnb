<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            //chiave esterna
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            //
            $table->string('title',150);
            $table->string('slug')->unique();
            $table->tinyInteger('num_rooms');
            $table->tinyInteger('num_beds');
            $table->tinyInteger('num_baths');
            $table->smallInteger('mq');
            $table->string('city',150);
            $table->string('province',150);
            $table->string('state');
            $table->string('andress')->nullable();
            $table->decimal('latitude',10,7);
            $table->decimal('longitude',10,7);
            $table->text('description');
            $table->text('main_img')->nullable();
            $table->decimal('price',10,2);
            $table->boolean('active')->default(1);
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
        Schema::dropIfExists('apartments');
    }
}
