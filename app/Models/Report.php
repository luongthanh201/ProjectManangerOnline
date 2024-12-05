<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $fillable = [
        'name',
        'file_path',
        'user_id',
        'created_date',
        'status'
    ];
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // 'id_user' là khóa ngoại
    }
}
