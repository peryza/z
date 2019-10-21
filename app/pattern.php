<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pattern extends Model
{
    private static $instance;

    protected function __construct() {
        //Do nothing
    }

    public static function getInstance() {
        if (empty(pattern::$instance)) {
            pattern::$instance = new pattern();
            echo 'Получилось';
        }
        else {
            echo ', Already created';
        }

        return pattern::$instance;
    }
}
