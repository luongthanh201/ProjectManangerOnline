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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255); // Tên dự án
            $table->text('description'); // Miêu tả dự án
            $table->enum('status', ['active', 'inactive', 'completed'])->default('active'); // Trạng thái
            $table->dateTime('start_date'); // Ngày bắt đầu
            $table->dateTime('end_date'); // Ngày kết thúc
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade'); // Khóa ngoại
            $table->timestamps(); // Tự động thêm created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
