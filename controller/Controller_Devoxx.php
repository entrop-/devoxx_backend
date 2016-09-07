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

        return json_encode($array,JSON_UNESCAPED_SLASHES);
    }

    public function getBeacons(){

        //takes last 6 because im too lazy to create sessions
        $sql = StructureFactory::getFactory()->pdo();
        $query = 'SELECT m1.* FROM beacons m1 LEFT JOIN beacons m2 ON (m1.color = m2.color AND m1.id < m2.id) WHERE m2.id IS NULL;';

        $q = $sql->prepare($query);
        $q->execute();

        $response = [];

        while($result = $q->fetch(PDO::FETCH_ASSOC)){
            $response[] = array('id'=> $result['color'], 'url' => GLOBAL_PATH.IMAGE_PATH.$result['image']);
        }

        return $this->serialize($response);
    }

    public function getImages(){
        $files = [];

        foreach (glob("skin/images/*.png") as $filename) {
            $files[]= $filename;
        }
        return $files;
    }

}