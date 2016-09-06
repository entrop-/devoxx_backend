<?php

error_reporting(-1);
ini_set('display_errors', 'On');


require_once 'config.php';
require_once 'controller/StructureFactory.php';
require_once 'controller/Controller_Devoxx.php';



if ($_GET['token']){

    include 'skin/view/response.php';
} else {

    include 'skin/view/index.php';

}