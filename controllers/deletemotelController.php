<?php

    include_once(__DIR__ . '/../models/motelModel.php');

class deleteMotel {
  public function __invoke() {
      $id = $_GET['idNhaTro'];
      $motel = new motelModel();
      if (isset($_POST['submit'])) {
          $motel->delete($id);
          echo '<meta http-equiv="refresh" content="0;url=homepage.php">';
          exit();
      }
  }
}