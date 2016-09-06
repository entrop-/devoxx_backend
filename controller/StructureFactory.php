<?php

/**
 * Created by PhpStorm.
 * User: entrop
 * Date: 06/09/16
 * Time: 23:03
 */
class StructureFactory
{
    private static $factory;

    public static function getFactory()
    {
        if(!self::$factory){
            self::$factory = new StructureFactory();
            return self::$factory;
        }

    }

    private $db;

    public function pdo()
    {
        if(!$this->db){
            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            );
            $this->db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASS, $options);
        }
        return $this->db;
    }

}