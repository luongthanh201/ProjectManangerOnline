<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
    use HasFactory;
    protected $table = 'notifies';
    protected $fillable = [
        'name',
        'content',
        'id_user',
        'status'
    ];
    public $timestamps = true;
    public function user()
{
    return $this->belongsTo(User::class, 'id_user'); // 'id_user' là khóa ngoại
}
}
