<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Twitte extends Model
{
    protected $fillable = [
        'created_at', 'id', 'id_str', 'text', 'truncated', 'source', 'in_reply_to_status_id', 
        'in_reply_to_status_id_str', 'in_reply_to_user_id', 'in_reply_to_user_id_str', 
        'in_reply_to_screen_name', 'geo', 'coordinates', 'place', 'contributors', 'is_quote_status', 
        'retweet_count', 'favorite_count', 'favorited', 'retweeted', 'possibly_sensitive', 'lang'
    ];
}
