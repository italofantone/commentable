<?php

namespace Italofantone\Commentable\Tests\Models;

use Italofantone\Commentable\Commentable;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    use Commentable;

    // ...
}