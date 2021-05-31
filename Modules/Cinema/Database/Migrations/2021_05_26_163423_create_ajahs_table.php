<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAjahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ajahs', function (Blueprint $table) {
            $table->id();
            $table->string('admin')->nullable();
            $table->string('caption')->nullable();
            $table->string('details')->nullable();
            $table->string('movie')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('ajahs');
    }
}
