<?php
    include_once('../libs/database.php');

class accountModel
{
    private $db;
    public $id;
    public $email;
    public $hashPass;
    public $role;
    public $verify;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function foundUser($email)
    {
        $query = "SELECT * FROM account where Email = '$email' LIMIT 1";
        $result = $this->db->select($query);
        if($result && $row = mysqli_fetch_assoc($result)){
            $_SESSION['user_id'] = $row['MaAccount'];
            $_SESSION['user_role'] = $row['role'];
            return true;
        }
        return false;
    }
    public function login($email, $password)
    {
        $query = "SELECT * FROM account WHERE Email = '$email' LIMIT 1";
        $result = $this->db->select($query);
        if(!$result)
        {
            return false;
        }
        $user = $result->fetch_assoc();

        if(!password_verify($password.$this->db->SECRET, $user['hashPass']))
        {
            return false; //password not incorrect
        }
        $_SESSION['user_id'] = $user['MaAccount'];
        $_SESSION['user_email'] = $user['Email'];
        $_SESSION['user_role'] = $user['role'];
        return true;
    }
    public function register($email, $password, $role)
    {
        $hash = password_hash($password . $this->db->SECRET, PASSWORD_ARGON2I);
        $query = "INSERT INTO account (Email, hashPass, role, verify) VALUES ('$email','$hash','$role', 0)";
        $result = $this->db->insert($query);
        if($result){
            // OTP mailer
            $otp = $this->db->generateRandomString(6);
            $_SESSION['otp'] = $otp;
            $name = "BKL";  // Name of your website or yours
            $to = $email;  // mail of reciever
            $subject = "VERIFY ACCOUNT";
            $body = file_get_contents('../views/sendotp.php');
            $from = $this->db->APP_MAIL;  // your mail
            $password = $this->db->APP_PASS;  // your mail password
            $body = str_replace('{name}', $name, $body);
            $body = str_replace('{otp}', $otp, $body);
            // Ignore from here

            require_once "PHPMailer/PHPMailer.php";
            require_once "PHPMailer/SMTP.php";
            require_once "PHPMailer/Exception.php";
            $mail = new PHPMailer\PHPMailer\PHPMailer();
            // To Here

            //SMTP Settings
            $mail->isSMTP();
            // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging
            $mail->Host = "smtp.gmail.com"; // smtp address of your email
            $mail->SMTPAuth = true;
            $mail->Username = $from;
            $mail->Password = $password;
            $mail->Port = 587;  // port
            $mail->SMTPSecure = "tls";  // tls or ssl
            $mail->smtpConnect([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                ]
            ]);

            //Email Settings
            $mail->isHTML(true);
            $mail->setFrom($from, $name);
            $mail->addAddress($to); // enter email address whom you want to send
            $mail->Subject = ("$subject");
            $mail->Body = $body;
            if ($mail->send()) {
                //echo "Email is sent!";
                return true;
            } else {
                 echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
                return false;
            }
        }
    }

    public function updateVerify($email, $id)
    {
        $query = "UPDATE account SET verify = 1 WHERE Email = '$email' AND MaAccount = '$id'";
        // $query = "SELECT * FROM account WHERE Email = '$email'";
        $result = $this->db->update($query);
        if($result) return true;
        return false;
    }
    public function registerName($id, $name, $citizenID)
    {
        if($_SESSION['user_role'] == 0){
            $query = "INSERT INTO chutro (MaAccount, Ten, CMND) VALUES ('$id','$name','$citizenID')";
            $result = $this->db->insert($query);
            if($result){
                return true;
            }
        } else {
            $query = "INSERT INTO khachtro (MaAccount, Ten, CMND) VALUES ('$id','$name','$citizenID')";
            $result = $this->db->insert($query);
            if($result){
                return true;
            }
        }
        return false;
    }
    public function forgetpassword($email)
    {
        $result = $this->foundUser($email);
        if($result){
           // OTP mailer
           $otp = $this->db->generateRandomString(6);
           $_SESSION['otp'] = $otp;
           $name = "BKL";  // Name of your website or yours
           $to = $email;  // mail of reciever
           $subject = "VERIFY ACCOUNT";
           $body = file_get_contents('../views/sendotp.php');
           $from = $this->db->APP_MAIL;  // your mail
           $password = $this->db->APP_PASS;  // your mail password
           $body = str_replace('{name}', $name, $body);
           $body = str_replace('{otp}', $otp, $body);
           // Ignore from here

           require_once "PHPMailer/PHPMailer.php";
           require_once "PHPMailer/SMTP.php";
           require_once "PHPMailer/Exception.php";
           $mail = new PHPMailer\PHPMailer\PHPMailer();
           // To Here

           //SMTP Settings
           $mail->isSMTP();
           // $mail->SMTPDebug = 3;  Keep It commented this is used for debugging
           $mail->Host = "smtp.gmail.com"; // smtp address of your email
           $mail->SMTPAuth = true;
           $mail->Username = $from;
           $mail->Password = $password;
           $mail->Port = 587;  // port
           $mail->SMTPSecure = "tls";  // tls or ssl
           $mail->smtpConnect([
           'ssl' => [
               'verify_peer' => false,
               'verify_peer_name' => false,
               'allow_self_signed' => true
               ]
           ]);

           //Email Settings
           $mail->isHTML(true);
           $mail->setFrom($from, $name);
           $mail->addAddress($to); // enter email address whom you want to send
           $mail->Subject = ("$subject");
           $mail->Body = $body;
           if ($mail->send()) {
               //echo "Email is sent!";
               return true;
           } else {
                echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
               return false;
           }
        }
    }
    public function updatePassword($email, $password)
    {
        $hashed_password = password_hash($password . $this->db->SECRET, PASSWORD_ARGON2I);
        $query = "UPDATE account SET hashPass = '$hashed_password' WHERE email = '$email'";
        $result = $this->db->update($query);
        if($result)
        {
            return true;
        }
        else {
            return false;
        }
    }
}
