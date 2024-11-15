<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    protected $fillable = ['title', 'description', 'status', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class); 
    }
}
