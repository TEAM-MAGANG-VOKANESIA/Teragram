<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'followed_user_id',
    ];

    public function friends()
    {
        return $this->belongsToMany(User::class, 'user_id', 'followed_user_id');
    }

    public function user1()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function user2()
    {
        return $this->belongsTo(User::class, 'followed_user_id');
    }
}
