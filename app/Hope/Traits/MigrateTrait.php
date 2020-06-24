<?php

namespace App\Hope\Traits;

use Illuminate\Support\Facades\DB;

trait MigrateTrait {

    protected function setIncrement()
    {
        $dbType = env('DB_CONNECTION', 'mysql');

        $tableName = self::TABLE_NAME;
        $increment = config('hope.auto-increment');
        if ($dbType == 'mysql') {

        } else if ($dbType == 'pgsql') {
            $increment++;
            DB::statement("select setval('{$tableName}_id_seq',{$increment},false);");
        } else {
            DB::statement("ALTER TABLE {$tableName} AUTO_INCREMENT= {$increment}");
        }
    }
}
