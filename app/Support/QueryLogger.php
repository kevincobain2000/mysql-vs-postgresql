<?php

namespace App\Support;

use Illuminate\Log\LogServiceProvider;
use Log as BaseLog;
use DB;

class QueryLogger extends LogServiceProvider
{
    public function __construct($app)
    {
        if (false && app()->environment('local')) {
            DB::listen(function ($query) {
                $sql = $query->sql;
                if ($this->hasStringKeys($query->bindings)) {
                    foreach ($query->bindings as $key => $value) {
                        $sql = preg_replace("/:$key/", $value, $sql, 1);
                    }
                } else {
                    for ($i = 0; $i < count($query->bindings); $i++) {
                        $sql = preg_replace("/\?/", $query->bindings[$i], $sql, 1);
                    }
                }
                BaseLog::debug('Took: ' . $query->time . " ms\t" . $query->connectionName . "\tsql:" . $sql);
            });
        }
        return parent::__construct($app);
    }

    private function hasStringKeys(array $array)
    {
        return count(array_filter(array_keys($array), 'is_string')) > 0;
    }
}
