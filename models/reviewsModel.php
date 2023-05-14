<?php
include_once __DIR__ . '/../libs/database.php';
include_once __DIR__ . '/../models/reviewsModel.php';

class reviewsModel
{
    public $MaPhongTro;
    public $MaAccount;
    public $content;
    private $db;


    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllReviews($MaPhongTro )
    {
        $query = "SELECT * FROM reviews Left join account
            on account.MaAccount = reviews.MaAccount
            left join khachtro on khachtro.MaAccount =  account.MaAccount
            Left join phongtro on reviews.MaPhongTro  = phongtro.MaPhongTro 
            where reviews.MaPhongTro={$MaPhongTro}";
        $result = $this->db->select($query);
        if (!$result) {
            echo '<div class="container" ><p style="margin:30px 0">Phòng này hiện tại chưa có bình luận</p></div>';
            //echo ; //
            // exit;
            // die;
            return;
        }
        $reviews = [];
        while ($row = $result->fetch_assoc()) {
            $reviews[] = $row;
        }

        return $reviews;
    }

    public function addReviews($MaPhongTro,$MaAccount,$content)
    {
        $query = "INSERT INTO reviews (MaPhongTro, MaAccount, content, submit_date)
              VALUES('{$MaPhongTro}', '{$MaAccount}', '{$content}', NOW())";
        $result = $this->db->insert($query);
        if ($result) {
            return true;
        }

        return false;
    }

}
