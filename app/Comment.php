<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Table Name
    protected $table = 'comments';
    // Primary Key
    protected $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    protected $fillable = [
        'body', 'post_id', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function post(){
        return $this->belongsTo('App\Post');
    }
}
