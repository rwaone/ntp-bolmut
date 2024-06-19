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
            $table->foreignId('petugas_id')->nullable();
            $table->date('enumeration_date')->nullable();
            $table->foreignId('pengawas_id')->nullable();
            $table->date('review_date')->nullable();
            $table->foreignId('sample_id');
            $table->text('commodities')->nullable();
            $table->text('notes')->nullable();
            $table->string('created_by')->nullable();
            $table->string('reviewed_by')->nullable();
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
