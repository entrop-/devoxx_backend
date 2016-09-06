<?php

/**
 * Created by PhpStorm.
 * User: entrop
 * Date: 06/09/16
 * Time: 00:27
 */

$provider = function()
{
    $instance = new PDO('mysql:......;charset=utf8', 'username', 'password');
    $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $instance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $instance;
};

$factory = new StructureFactory( $provider );