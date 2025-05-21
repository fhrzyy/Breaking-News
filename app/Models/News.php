<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'content', 'image', 'user_id', 'status', 'section', 'category'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approvals()
    {
        return $this->hasMany(NewsApproval::class);
    }
}