<?php
include('./database.php');
$otp = new Database();
$check = $otp->generateRandomString(6);
echo $check;
?>
