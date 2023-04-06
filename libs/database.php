<?php
$filepath = realpath(dirname(__FILE__));
include ($filepath.'/../config/config.php');
?>

<?php
  class Database{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;
    public $APP_MAIL = APP_MAIL;
    public $APP_PASS = APP_PASS;
    public $SECRET = SECRET;

    public $link;
    public $error;

    public function __construct(){
      $this->connectDB();
    }

    private function connectDB(){
      $this->link = new mysqli($this->host,$this->user,$this->pass,$this->dbname);

      if($this->link){
        $this->error = "Connection failed".$this->link->connect_error;
        return false;
      }
    }

    public function selectWithoutDebug($query){
      $result = $this->link->query($query) or die($this->link->error.__LINE__);

      if($result->num_rows > 0){
        return $result;
      }else{
        return false;
      }
    }

    public function select($query){
      $result = $this->link->query($query) or die($this->link->error.__LINE__);

      if($result->num_rows > 0){
        return $result;
      }else{
        echo "Database Error: " . $this->link->error . "<br>";
        echo "SQL Query: " . $query . "<br>";
        return false;
      }
    }

    public function insert($query){
      $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
      if($insert_row){
        return $insert_row;
      }else{
        echo "Database Error: " . $this->link->error . "<br>";
        echo "SQL Query: " . $query . "<br>";
        return false;
      }
    }

    public function update($query){
      $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
      if($update_row){
        return $update_row;
      }else{
        echo "Database Error: " . $this->link->error . "<br>";
        echo "SQL Query: " . $query . "<br>";
        return false;
      }
    }

     public function delete($query){
      $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
      if($delete_row){
        return $delete_row;
      }else{
        echo "Database Error: " . $this->link->error . "<br>";
        echo "SQL Query: " . $query . "<br>";
        return false;
      }
    }
    public function generateRandomString($length) {
      // $lowercase = "abcdefghijklmnopqrstuvwxyz";
      // $uppercase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
      $numbers = "0123456789";
      // $special = "!@#$%^&*()_+";
      // $str = $lowercase . $uppercase . $numbers . $special;
      $str = $numbers;
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $str[rand(0, strlen($str) - 1)];
      }
      return $randomString;
    }
    public function prepare($query) {
      $stmt = $this->link->prepare($query) or die($this->link->error.__LINE__);
      return $stmt;
    }
  }
?>