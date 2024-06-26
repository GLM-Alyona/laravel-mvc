<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->foreignId('group_id')->constrained();
            //$table->unsignedBigInteger('group_id')->nullable();
            $table->index('group_id', 'student_group_idx');
            //$table->foreign('group_id', 'student_group_fk')->on('groups')->references('id');

            $table->string('surname');
            $table->string('name');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};