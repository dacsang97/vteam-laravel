<?php

namespace App\HiddenLink;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['user_id', 'hash_id', 'hide_link', 'post_link', 'comments_lock', 'reactions_lock'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
