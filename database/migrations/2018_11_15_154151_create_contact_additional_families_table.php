<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactAdditionalFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_additional_families', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id', false, true);
            $table->string('name', 128);
            $table->string('address', 500);
            $table->string('email', 128);
            $table->string('phone_number', 128);
            $table->string('relation_with_decease', 128);
            $table->boolean('status')->default(1);
            $table->timestamps();

            $table->foreign('contact_id')->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_additional_families');
    }
}
