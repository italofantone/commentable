<?php

namespace Italofantone\Commentable\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'body'];

    /**
     * Get all of the owning commentable models.
     */
    public function commentable()
    {
       return $this->morphTo();
    }

    /**
     * Get the user that owns the comment.
     */
    public function user()
    {
        return $this->belongsTo(config('commentable.user_model'));
    }
}