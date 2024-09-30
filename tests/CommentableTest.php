<?php

namespace Italofantone\Commentable\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Italofantone\Commentable\Tests\Models\TestModel;
use Italofantone\Commentable\Tests\Models\User;

class CommentableTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_model_have_comments()
    {
        $model = TestModel::create();

        $model->comments()->create(['body' => 'My First Comment']);
        
        $this->assertCount(1, $model->comments);

        $comment = $model->comments->first();

        $this->assertEquals('My First Comment', $comment->body);

        $this->assertInstanceOf(TestModel::class, $comment->commentable);
        $this->assertEquals($model->id, $comment->commentable->id);
        $this->assertEquals(TestModel::class, $comment->commentable_type);
    }

    public function test_a_model_have_comments_with_user()
    {
        Config::set('commentable.user_model', User::class);

        $user = User::create(['name' => 'John Doe']);

        $model = TestModel::create();

        $model->comments()->create(['body' => 'My First Comment', 'user_id' => $user->id]);
        
        $this->assertCount(1, $model->comments);

        $comment = $model->comments->first();

        $this->assertEquals('My First Comment', $comment->body);

        $this->assertInstanceOf(TestModel::class, $comment->commentable);
        $this->assertEquals($model->id, $comment->commentable->id);
        $this->assertEquals(TestModel::class, $comment->commentable_type);

        $this->assertEquals(1, $comment->user_id);
        $this->assertEquals(1, $comment->user->id);
        $this->assertEquals('John Doe', $comment->user->name);
    }
}