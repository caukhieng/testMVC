<?php

require __DIR__ . '/../vendor/autoload.php';
include_once __DIR__. ('/../libs/database.php');

use Kreait\Firebase\Factory;
use Kreait\Firebase\Storage\Storage;
use Google\Cloud\Storage\StorageClient;
class pictureModel
{
    private $firebase;
    private $storage;
    private $db;
    public function __construct()
    {
        /* Creating a new instance of the `Database` class, which is likely a custom class that handles
        database connections and queries. The instance is stored in the `->db` property of the
        `pictureModel` class, allowing the `pictureModel` to interact with the database through the
        `Database` class. */
        $this->db = new Database();
        $factory = (new Factory())->withServiceAccount(__DIR__.'/../config/firebase-config.json');
        $this->storage = $factory->createStorage();
    }
    public function uploadImagesFirebase($files)
    {
        $urls = [];
        $bucket = $this->storage->getBucket();
        foreach ($files as $file) {
            $objectName = 'images/' . uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
            $object = $bucket->upload(file_get_contents($file['tmp_name']), [
                'name' => $objectName
            ]);
            $expirationTime = new \DateTime();
            $expirationTime->modify('+1 month');
            $url = $object->signedUrl($expirationTime);
            // $url = $object->signedUrl(new \DateTime(''));
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
    public function getImageDatabase()
    {
        // $query = "SELECT * FROM `picture` WHERE `idPhongTro` = '$idPhongTro'";
        $query = "SELECT url FROM `picture` ORDER BY RAND() LIMIT 1";
        $result =  $this->db->select($query);
        if(!$result) return false;
        return $result;
    }
    public function getAllImageDatabase($id)
    {
        $query = "SELECT * FROM `picture` WHERE MaPhongTro = $id";
        $result = $this->db->select($query);
        if(!$result) return false;
        return $result;
    }
    public function updateImageDatabase($url, $idimage)
    {
        $query = "UPDATE `picture` SET url='$url' WHERE id = $idimage";
        $result = $this->db->update($query);
        if(!$result)
        {
            return false;
        }
        return true;
    }
    public function deleteImageDatabase($idimage)
    {
        $query = "DELETE FROM picture WHERE id = $idimage";
        $result = $this->db->delete($query);
        if(!$result)
        {
            return false;
        }
        return true;
    }
}