<?php

namespace Italofantone\Commentable;

use Italofantone\Commentable\Models\Comment;

trait Commentable
{
    /**
     * Get all of the model's comments.
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}