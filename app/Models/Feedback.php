<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    protected $fillable = [
        'id_user',
        'id_project',
        'content',
        'status',
        'priority'
    ];
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Define relationship with Project (if not defined already)
    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }
}
