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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->string('fsic_id')->unique();
            $table->timestamp('filled_date');
            $table->enum('occupancy_type', ['Business', 'Private']);
            $table->enum('issuance_type', ['New', 'Renewal']);
            $table->string('others')->nullable();
            $table->text('description');
            $table->timestamp('valid_until');
            $table->string('chief');
            $table->string('marshal');
            $table->enum('status', ['For Inspection', 'For Compliance', 'Re-Inspection', 'Completed'])->default('For Inspection');
            $table->enum('validity', ['Valid', 'Invalid'])->default('Valid');
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
        Schema::dropIfExists('certificates');
    }
};
