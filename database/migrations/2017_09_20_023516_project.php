<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Project extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->integer('type');
            $table->string('name');
            $table->text('short_des');
            $table->text('description');
            $table->string('picture')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('isIdea');
            $table->date('fromDate')->nullable();
            $table->date('toDate')->nullable();
            $table->text('sid');
            $table->text('alias');
            $table->text('contact');
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
        Schema::dropIfExists('projects');
    }
}
