<?php

require_once __DIR__ . '/../vendor/autoload.php';
include_once('../libs/database.php');

use Kreait\Firebase\Factory;
use Kreait\Firebase\Storage\Storage;

class pictureModel
{
    private $firebase;
    private $storage;
    private $db;
    public function __construct()
    {
        $this->db = new Database();
        $factory = (new Factory())->withServiceAccount(__DIR__.'/../config/firebase-config.json');
        $this->firebase = $factory->createDatabase();
        $client = new GuzzleHttp\Client([
            'verify' => false
        ]);
        $this->storage = $factory->createStorage();
    }
    // public function uploadImagesFirebase($files)
    // {
    //     $urls = [];
    //     $bucket = $this->storage->getBucket();
    //     foreach ($files as $file) {
    //         $objectName = 'images/' . uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    //         $object = $bucket->upload(file_get_contents($file['tmp_name']), [
    //             'name' => $objectName
    //         ]);
    //         $url = $object->signedUrl(new \DateTime('tomorrow'));
    //         $urls[] = $url;
    //     }
    //     return $urls;
    // }
    public function uploadImagesFirebase($files)
    {
        $urls = [];
        $bucket = $this->storage->getBucket();
        foreach ($files as $file) {
            $objectName = 'images/' . uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
            $object = $bucket->upload(file_get_contents($file['tmp_name']), [
                'name' => $objectName
            ]);
            $url = $object->signedUrl(new \DateTime('tomorrow'));
            $urls[] = $url;
        }
        return $urls;
    }
    public function uploadImageDatabase($urls, $idPhongTro)
    {
        $success = true;
        foreach($urls as $url) {
            $query = "INSERT INTO `picture`(url, MaPhongTro) VALUES ('$url','$idPhongTro')";
            $result = $this->db->insert($query);
            if(!$result) {
                $success = false;
                break;
            }
        }
        return $success;
    }
}