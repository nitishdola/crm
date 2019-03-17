<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 127);
            $table->string('last_name', 127);
            $table->string('deceased_first_name', 127);
            $table->string('deceased_last_name', 127);
            $table->string('referral_first_name', 127);
            $table->string('relation_with_decease', 127);
            $table->string('address', 500);
            $table->string('email', 127)->nullable();
            $table->string('cell_number', 127);
            $table->string('home_number', 127)->nullable();
            $table->integer('agent_id', false, true);
            $table->boolean('status')->default(1);

            $table->foreign('agent_id')->references('id')->on('agents');
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
        Schema::dropIfExists('referrals');
    }
}
