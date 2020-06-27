<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use NanQi\Hope\Models\BaseModel;
use NanQi\Hope\Traits\ModelEncryptionTrait;

class UserModel extends BaseModel
{
    use ModelEncryptionTrait;

    protected $encryptable = ['phone'];

    protected $table = "users";

    public function setPasswordAttribute($value)
    {
        if (Hash::needsRehash($value)) {
            $value = Hash::make($value);
        }

        $this->attributes['password'] = $value;
    }
}
