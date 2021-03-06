<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourierTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courier_types', function (Blueprint $table) {
            $table->id();
            $table->string('courier_type_name');
            $table->string('registration_number');
            $table->string('year')->nullable();
            $table->string('condition')->nullable();
            $table->longText('route')->nullable();
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
        Schema::dropIfExists('courier_types');
    }
}
