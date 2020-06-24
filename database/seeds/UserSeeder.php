<?php

use App\Models\UserModel;

class UserSeeder extends BaseSeeder
{
    public function runFake()
    {
        factory(UserModel::class)->times(100)->create();
    }
}
