<?php

namespace App\Models;

use App\Hope\Models\BaseModel;
use App\Hope\Traits\ModelEncryptionTrait;
use Illuminate\Support\Facades\Hash;

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
