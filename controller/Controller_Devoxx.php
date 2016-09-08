<?php

/**
 * Created by PhpStorm.
 * User: entrop
 * Date: 06/09/16
 * Time: 00:13
 */
class Controller_Devoxx
{

    public function __construct()
    {


    }

    private $beacon_names = [
        'beetroot', 'ice', 'lemon', 'blueberry', 'mint', 'candy'
    ];


    private function serialize($array)
    {
        return json_encode($array, JSON_UNESCAPED_SLASHES);
    }

    public function getBeaconNames()
    {
        return $this->beacon_names;
    }

    public function getBeacons()
    {

        //takes last 6 because im too lazy to create sessions
        $sql = StructureFactory::getFactory()->pdo();
        $query = 'SELECT m1.* FROM beacons m1 LEFT JOIN beacons m2 ON (m1.color = m2.color AND m1.id < m2.id) WHERE m2.id IS NULL;';

        $q = $sql->prepare($query);
        $q->execute();

        $response = [];

        while ($result = $q->fetch(PDO::FETCH_ASSOC)) {
            $response[] = array('id' => $result['color'], 'url' => $result['image']);
        }

        return $this->serialize($response);
    }

    public function getImages()
    {
        $files = [];

        foreach (glob("skin/images/*.png") as $filename) {
            $files[] = $filename;
        }
        return $files;
    }

    public function sendForm($array)
    {
        $sql = StructureFactory::getFactory()->pdo();
        $query = 'INSERT INTO beacons VALUES("",?,?);';

        $q = $sql->prepare($query);
        $q->bindParam(1, $array[0]);
        $q->bindParam(2, $array[1]);

        $q->execute();


    }

    function getfile($filename)
    {

        $maxage = 90; // days
        $maxageS = $maxage * 24 * 60 * 60; // seconds

        $mime = array(
            'css' => 'text/css',
            'js' => 'text/javascript',
            'json' => 'application/json',
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'gif' => 'image/gif',
            'htm' => 'text/html',
            'html' => 'text/html',
            'txt' => 'text/plain',
            'pdf' => 'application/pdf',
            'ttf' => 'application/octet-stream',
            'svg' => 'image/svg+xml',
            'eot' => 'application/vnd.ms-fontobject',
            'woff' => 'application/font-woff',
            'woff2' => 'application/font-woff2',
        );

        $code = 200;
        $headers = array();
        $path = pathinfo($filename);
        $ext = $path['extension'];
        $skip = true;

        if (!file_exists($filename) || !array_key_exists($ext, $mime)) {
            $code = 400;
        } else {
            $type = $mime[$ext];
            $size = filesize($filename);
            $lmdate = filemtime($filename);

            $headers[] = 'Content-Type: ' . $type;
            $headers[] = 'Last-Modified: ' . gmdate('D, d M Y H:i:s ', $lmdate) . 'GMT';
            $headers[] = 'Expires: ' . gmdate('D, d, M Y H:i:s ', strtotime('+' . $maxage . ' days', $lmdate)) . 'GMT';
            $headers[] = 'Cache-Control: public, max-age=' . $maxageS;
            $headers[] = 'Content-Length: ' . filesize($filename);

            if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $lmdate) {
                $headers[] = 'HTTP/1.0 304 Not Modified';
            } else {
                $skip = false;
            }

        }

        header(' ', true, $code);

        if (count($headers) > 0) {
            foreach ($headers as $header) {
                header($header);
            }
        }

        if (!$skip) {
            readfile($filename);
        }

        exit();


    }
}