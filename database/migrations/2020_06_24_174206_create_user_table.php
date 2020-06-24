<?php

use App\Hope\Traits\MigrateTrait;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    use MigrateTrait;

    const TABLE_NAME = 'users';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('phone', 100)->comment('手机号');
            $table->string('nickname', 20)->comment('昵称');
            $table->string('avatar', 200)->comment('头像');
            $table->string('password', 100)->comment('密码');
            $table->timestamps();
        });

        $this->setIncrement();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
