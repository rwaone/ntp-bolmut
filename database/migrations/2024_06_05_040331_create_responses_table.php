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
            $table->foreignId('petugas_id')->nullable()->nullable();
            $table->date('enumeration_date')->nullable()->nullable();
            $table->foreignId('pengawas_id')->nullable()->nullable();
            $table->date('review_date')->nullable()->nullable();
            $table->string('sample_id', 36);
            $table->text('commodities')->nullable()->nullable();
            $table->text('notes')->nullable()->nullable();
            $table->string('status')->default('B');
            $table->string('created_by')->nullable()->nullable();
            $table->string('reviewed_by')->nullable()->nullable();
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
