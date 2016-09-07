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

    private $beacon_names = [
        'beetroot','ice','lemon','blueberry','mint','candy'
    ];


    private function serialize($array){
        return json_encode($array,JSON_UNESCAPED_SLASHES);
    }

    public function getBeconNames(){
        return $this->beacon_names;
    }

    public function getBeacons(){

        //takes last 6 because im too lazy to create sessions
        $sql = StructureFactory::getFactory()->pdo();
        $query = 'SELECT m1.* FROM beacons m1 LEFT JOIN beacons m2 ON (m1.color = m2.color AND m1.id < m2.id) WHERE m2.id IS NULL;';

        $q = $sql->prepare($query);
        $q->execute();

        $response = [];

        while($result = $q->fetch(PDO::FETCH_ASSOC)){
            $response[] = array('id'=> $result['color'], 'url' => $result['image']);
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

    public function sendForm($array){
        $sql = StructureFactory::getFactory()->pdo();
        $query = 'INSERT INTO beacons VALUES("",?,?);';

        $q = $sql->prepare($query);
        $q->bindParam(1, $array[0]);
        $q->bindParam(2, $array[1]);

        $q->execute();


    }

}