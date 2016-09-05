<?php

/**
 * Created by PhpStorm.
 * User: entrop
 * Date: 06/09/16
 * Time: 00:27
 */
class Database
{
    public function __construct(){
        $this->connect();
    }

    public function connect(){

        try {
            $dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

        if (!$e)
            return $dbh;
    }
}