<?php 

    include "../modal/pdo.php";

    if(isset($_GET['count']) && $_GET['count'] == 'user') {
        chart_user_limit();
    }
    function chart_user_limit()  {
        $conn = pdo_get_connection();
            for($i=0;$i < 7 ; $i++) { 
                $doituong = new stdClass;
                $date = date('Y-m-d');
                $newdate = strtotime ( "-$i day" , strtotime ( $date ) ) ;
                $newdate = date ( 'Y-m-d' , $newdate );
                $user_sql = "SELECT COUNT(createdAt) as 'count' FROM user WHERE createdAt like '%$newdate%'";
                $query = $conn  -> query($user_sql);
                $result = $query -> fetchAll();
                $doituong -> date = "$newdate";
                $doituong -> count = $result[0][0];
                $data[] = $doituong;
            }
        header("Access-Control-Allow-Origin: *");
        echo json_encode($data);                
    }
?>