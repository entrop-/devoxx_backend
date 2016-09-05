<?php

require_once 'config.php';

if ($_GET['token']){

    include 'skin/view/response.php';
} else {

    include 'skin/view/index.php';

}