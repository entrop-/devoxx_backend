<?php

//error_reporting(-1);
//ini_set('display_errors', 'On');


require_once 'config.php';
require_once 'controller/StructureFactory.php';
require_once 'controller/Controller_Devoxx.php';



if ($_GET['token']){

    include 'skin/view/response.php';
} else {
    if($_POST){
        //not so secure
        $data[] = $_POST['color'];
        $data[] = $_POST['url'];
        $devox = new Controller_Devoxx;
        $devox->sendForm($data);

    }
    include 'skin/view/index.php';

}