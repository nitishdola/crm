<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 128);
            $table->string('address', 500);
            $table->string('email', 128);
            $table->string('phone_number', 50);
            $table->string('relation_with_decease', 128);
            $table->string('name_of_deceased', 128);
            $table->date('deceased_dob');
            $table->date('deceased_date_of_death');
            $table->date('deceased_wedding_anniversary_date');
            $table->string('other_significant_celebration', 128)->nullable();
            $table->date('other_significant_celebration_date')->nullable();
            $table->integer('added_by', false, true)->nullable();
            $table->string('current_status', 128)->default('contact_added');
            $table->boolean('status')->default(1);

            $table->timestamps();

            $table->foreign('added_by')->references('id')->on('admins');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
