<?php

namespace App\Controllers;

use App\Models\UserModel;
use NanQi\Hope\Hope;

class TestController extends Controller
{
    public function test()
    {
        $model = UserModel::query()->firstOrFail();
        return $model;
    }
}
