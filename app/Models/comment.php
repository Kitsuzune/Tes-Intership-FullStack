<?php

namespace App\Models;

use App\Models\User;
use App\Models\data;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'user_id', 'data_id'];

    public function comments()
    {
    return $this->hasMany(Comment::class, 'data_id');
    }  

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function data()
    {
        return $this->belongsTo(data::class);
    }
}
