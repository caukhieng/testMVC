<?php 
    include_once __DIR__ . '/libs/database.php';

    header('Content-Type: application/json');

    $data = array();
    $query = "SELECT SUM(thanhtien) as total, month.idMonth FROM( SELECT 1 as idMonth UNION SELECT 2 as idMonth UNION SELECT 3 as idMonth UNION SELECT 4 as idMonth UNION SELECT 5 as idMonth UNION SELECT 6 as idMonth UNION SELECT 7 as idMonth UNION SELECT 8 as idMonth UNION SELECT 9 as idMonth UNION SELECT 10 as idMonth UNION SELECT 11 as idMonth UNION SELECT 12 as idMonth ) as Month LEFT Join `hopdongthue`on Month.idMonth = DATE_FORMAT(`hopdongthue`.ngaylaphoadon, '%m') WHERE `hopdongthue`.ngaylaphoadon <= NOW() and `hopdongthue`.ngaylaphoadon >= Date_add(Now(),interval - 12 month) GROUP BY DATE_FORMAT(`hopdongthue`.ngaylaphoadon, '%m-%Y')";
    // $stmt = $conn->prepare($query);
    $db = new Database();
    if(!$db->select($query)){
        return false;
    }
    $result = $db->select($query);
    foreach($result as $row){
        $data[] = $row;
    }
    echo json_encode($data);
?>