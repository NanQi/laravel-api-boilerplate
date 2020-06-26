<?php

namespace App\Controllers;

use App\Hope\Controllers\BaseController;
use App\Hope\Services\JwtService;
use App\Hope\Transformers\BaseTransformer;
use App\Models\UserModel;

class TestController extends BaseController
{
    public function test()
    {
        $model = UserModel::query()->firstOrFail();
        return $model;
    }
}
