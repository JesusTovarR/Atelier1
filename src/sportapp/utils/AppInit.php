<?php

/**
 * Created by PhpStorm.
 * User: dano
 * Date: 21/10/16
 * Time: 11:19 AM
 */

namespace sportapp\utils;

use Illuminate\Database\Capsule\Manager;

class AppInit
{

    public static function bootEloquent($file){
        $conf = parse_ini_file($file);
        $db = new Manager();
        $db->addConnection($conf);
        $db->setAsGlobal();
        $db->bootEloquent();
    }

}