<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomchat extends Model
{
    use HasFactory;

    protected $fillable = ['user1_id', 'user2_id'];

    public function user1()
    {
        return $this->belongsTo(User::class);
    }

    public function user2()
    {
        return $this->belongsTo(User::class);
    }

    public function message()
    {
        return $this->hasMany(Message::class);
    }
}
