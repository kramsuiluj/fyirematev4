<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heads', function (Blueprint $table) {
            $table->id();
            $table->enum('position', ['Chief', 'Marshal']);
            $table->string('title')->nullable();
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->timestamps();

            $table->unique(['firstname', 'middlename', 'lastname']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heads');
    }
};
