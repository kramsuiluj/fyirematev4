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
        Schema::create('inspection_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('certificate_id')->constrained('certificates', 'id')->cascadeOnDelete();
            $table->integer('io_number')->unique();
            $table->string('io_to');
            $table->string('proceed');
            $table->string('purpose');
            $table->string('duration');
            $table->string('remarks');
            $table->string('chief');
            $table->string('marshal');
            $table->timestamp('processed_at');
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
        Schema::dropIfExists('inspection_orders');
    }
};
