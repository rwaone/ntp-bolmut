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
        Schema::create('qualities', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('commodity_id');
            $table->string('name');
            $table->bigInteger('min_price');
            $table->bigInteger('max_price');
            $table->string('status');
            $table->string('created_by');
            $table->string('reviewed_by');
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
        Schema::dropIfExists('qualities');
    }
};
