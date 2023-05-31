<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data extends Model
{

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
    return $this->hasMany(Comment::class, 'data_id');
    }

    protected $fillable = [
        'title',
        'description',
    ];

    use HasFactory;
}
