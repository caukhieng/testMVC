<?php

require_once __DIR__ . '/../../models/pictureModel.php';
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $idPhongTro = $_GET['idPhongTro'];
    $URL = $_ENV['URL'] . 'configureimage?idPhongTro=' . $idPhongTro;
    $model = new pictureModel();
    $result = $model->deleteImageDatabase($id);
    if ($result) {
        header('Location:' . $URL);
    }
}
