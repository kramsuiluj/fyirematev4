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
        Schema::create('fsics', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->enum('occupancy', ['Private', 'Business']);
            $table->enum('issuance', ['New', 'Renew']);
            $table->string('establishment');
            $table->text('description');
            $table->timestamp('expiration');
            $table->string('chief');
            $table->string('marshal');
            $table->enum('status', ['For Inspection', 'For Re-Inspection', 'Completed'])->default('For Inspection');
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
        Schema::dropIfExists('fsics');
    }
};
