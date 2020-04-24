<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_post','body','user_id',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class,'id_post');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
