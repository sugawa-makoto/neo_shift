<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYoubiUserGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('youbi_user_group', function (Blueprint $table) {
            $table->id();
            $table->date('day');
            $table->integer('year');
            $table->integer('month');
            $table->integer('youbi_id');
            $table->string('youbi_name');
            $table->integer('user_id');
            $table->string('user_name');
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
        Schema::dropIfExists('youbi_user_group');
    }
}
