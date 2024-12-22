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
        Schema::create('analytics', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->year('year');
            $table->decimal('ntp', $precision = 5, $scale = 2)->default(0);
            $table->decimal('ntup', $precision = 5, $scale = 2)->default(0);
            $table->decimal('ib', $precision = 5, $scale = 2)->default(0);
            $table->decimal('it', $precision = 5, $scale = 2)->default(0);
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
        Schema::dropIfExists('analytics');
    }
};
