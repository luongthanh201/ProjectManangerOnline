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
        Schema::create('documents', function (Blueprint $table) {
            $table->id(); // Tự động tạo khóa chính
            $table->string('name', 255); // Tiêu đề tài liệu
            $table->string('file_path', 255); // Đường dẫn tệp
            $table->string('type')->nullable(); 
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null'); // Liên kết với users
            $table->foreignId('project_id')->nullable()->constrained('projects')->onDelete('set null'); // Liên kết với projects
            $table->dateTime('uploaded_at'); // Thời gian tải lên
            $table->timestamps(); // Tự động tạo `created_at` và `updated_at`
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
