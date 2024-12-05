<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_project')->constrained('projects')->onDelete('cascade');
            $table->text('content');
            $table->enum('status', ['pending', 'resolved', 'in-progress'])->default('in-progress');
            $table->enum('priority', ['High', 'Medium', 'Low'])->default('Medium'); // Khai báo các mức độ ưu tiên
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
