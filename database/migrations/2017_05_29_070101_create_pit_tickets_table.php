<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePitTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pit_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hero_id');
            $table->enum('pit', ['Lazarus Pit', 'Gotham City', 'Star City']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pit_tickets');
    }
}
