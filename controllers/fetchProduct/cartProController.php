<?php 
    if(isset($_GET['method'])&& $_GET['method'] == 'delete') {
        include "../../modal/pdo.php";
        $id = $_GET['id'];
        $sql = "DELETE FROM `procart` WHERE id = $id";
        $result = prepareSql($sql);
        if($result) {
            echo json_encode(1);
            return ;

        }
        else {
            echo json_encode(0);
            return ;
        }
    }

    if(isset($_GET['method'])&& $_GET['method'] == 'update') {
        include "../../modal/pdo.php";
        $data = json_decode(file_get_contents("php://input"));

        foreach($data as $row) {
            $idPro = $row -> id;
            $quantily = $row -> quantily;
            $sql = "UPDATE `procart` SET `quantily`=$quantily WHERE id = '$idPro'";
            $result = prepareSql($sql);
        }

        echo json_encode(1);
    }
?>