<?php

/**
 * Created by PhpStorm.
 * User: entrop
 * Date: 06/09/16
 * Time: 00:13
 */
class Controller_Devoxx {

    public function __construct(){


    }

    private $beacon_images = [
        'yellow' => GLOBAL_PATH.IMAGE_PATH.'image1.jpg',
        'pink' => GLOBAL_PATH.IMAGE_PATH.'image2.jpg',
        'maroon' => GLOBAL_PATH.IMAGE_PATH.'image3.jpg',
        'cyan' => GLOBAL_PATH.IMAGE_PATH.'image4.jpg',
        'yelldow' => GLOBAL_PATH.IMAGE_PATH.'image5.jpg',
        'yellosw' => GLOBAL_PATH.IMAGE_PATH.'image6.jpg',
    ];

    private function serialize($array){
        if (empty($array) )
            $array = $this->beacon_images;

        return json_encode($array);
    }

    public function getBeacons(){

        //takes last 6 because im too lazy to create sessions
        $sql = StructureFactory::getFactory()->pdo();
        $query = 'SELECT DISTINCT(color),image FROM beacons ORDER BY id DESC LIMIT 6';

        $q = $sql->prepare($query);
        $q->execute();

        $response = [];

        while($result = $q->fetch(PDO::FETCH_ASSOC)){
            $response[$result['color']]= $result['image'];
        }

        return $this->serialize($response);
    }



}