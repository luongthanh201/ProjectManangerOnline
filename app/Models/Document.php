<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    // Các cột có thể điền
    protected $fillable = [
        'name',
        'file_path',
        'type',
        'user_id',
        'project_id',
        'uploaded_at',
    ];

    // Quan hệ với User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // user_id là khóa ngoại
    }

    // Quan hệ với Project
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id'); // project_id là khóa ngoại
    }
}
