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
            $table->enum('type',['Art and Culture', "Design Thinking", "Entrepreneurship and Management", "Science and Technology", "Sociopolitical Issues"]);
            $table->string('name');
            $table->text('short_des');
            $table->text('description');
            $table->string('picture')->nullable();
            $table->boolean('isIdea');
            $table->date('fromDate')->nullable();
            $table->date('toDate')->nullable();
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
