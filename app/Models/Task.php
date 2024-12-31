<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';
    protected $fillable = [
        'name',
        'id_user',
        'deadline',
        'status',
        'priority'
    ];
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user'); // 'id_user' là khóa ngoại
    }
}
