<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsApproval extends Model
{
    protected $fillable = ['news_id', 'admin_id', 'status', 'notes'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
