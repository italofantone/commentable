<?php

namespace Italofantone\Commentable\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Italofantone\Commentable\Tests\Models\TestModel;

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
}