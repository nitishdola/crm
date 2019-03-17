<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAppointmentFlds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('referrals', function (Blueprint $table) {
          $table->integer('assigned_to', false, true)->after('agent_id')->nullable();
          $table->dateTime('appointment_date')->nullable()->after('assigned_to');
          $table->decimal('sale_amount', 30, 2)->nullable()->after('appointment_date');
          $table->text('appointment_location')->after('appointment_date')->nullable();
          $table->text('appointment_notes',500)->after('appointment_location')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('referrals', function (Blueprint $table) {
            //
        });
    }
}
