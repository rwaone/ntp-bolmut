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
        Schema::create('responses', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->year('year');
            $table->foreignId('document_id');
            $table->foreignId('petugas_id');
            $table->date('enumeration_date');
            $table->foreignId('pengawas_id');
            $table->date('review_date');
            $table->foreignId('sample_id');
            $table->text('commodities');
            $table->text('notes');
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
        Schema::dropIfExists('responses');
    }
};
