<?php 
    include "../modal/pdo.php";

    if(isset($_GET['count']) && $_GET['count'] == 'order') {
        chart_user_limit();
    }
    function chart_user_limit()  {
        $conn = pdo_get_connection();
            for($i=0;$i < 10 ; $i++) { 
                $doituong = new stdClass;
                $date = date('Y-m-j');
                $newdate = strtotime ( "-$i day" , strtotime ( $date ) ) ;
                $newdate = date ( 'Y-m-j' , $newdate );
                $user_sql = "SELECT COUNT(createdAt) as 'count', SUM(total_money) as 'total' FROM orders WHERE createdAt like '%$newdate%'";
                $query = $conn  -> query($user_sql);
                $result = $query -> fetchAll();
                $doituong -> date = "$newdate";
                $doituong -> count = $result[0]['count'];
                $doituong -> sum = $result[0]['total'];
                $data[] = $doituong;
            }
        header("Access-Control-Allow-Origin: *");
        echo json_encode($data);                
    }


    if(isset($_GET['order']) && $_GET['order'] == 'category') {
        chart_category_order();
    }

    function chart_category_order() {
        $conn = pdo_get_connection();
        $sql = "SELECT cate.name as 'name',count(orpro.id) as 'count' , SUM(orpro.total_money) as 'money' FROM `orderpro` orpro JOIN product pro on pro.id = orpro.productId JOIN category cate on cate.id = pro.cateId GROUP BY cate.id";
        $data = $conn  -> query($sql) -> fetchAll();
        echo json_encode($data);                
    }
?>