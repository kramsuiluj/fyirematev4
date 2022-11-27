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
        Schema::create('establishments', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('owner')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('amount_paid')->nullable();
            $table->string('date_paid')->nullable();
            $table->string('or_number')->nullable();
            $table->string('ops_number')->nullable();
            $table->string('date_released')->nullable();
            $table->string('fsic_number')->nullable();
            $table->string('issuance')->nullable();
            $table->string('occupancy')->nullable();
            $table->integer('area')->nullable();
            $table->string('remarks')->nullable();
            $table->string('inspection_date')->nullable();
            $table->string('io_number')->nullable();
            $table->string('realty_tax')->nullable();
            $table->double('amount')->nullable();
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
        Schema::dropIfExists('establishments');
    }
};
