<?php
header('Content-Type: application/json');

$devoxx = new Controller_Devoxx();

echo $devoxx->getBeacons();