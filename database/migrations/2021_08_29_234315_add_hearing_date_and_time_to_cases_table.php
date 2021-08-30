<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHearingDateAndTimeToCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cases', function (Blueprint $table) {
            $table->string('hearing_time')->default(N/A);
            $table->string('hearing_date')->default(N/A);
            $table->string('hearing_courtroom')->default(N/A);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cases', function (Blueprint $table) {
            dropColumn('hearing_time');
            dropColumn('hearing_date');
            dropColumn('hearing_courtroom');
        });
    }
}
