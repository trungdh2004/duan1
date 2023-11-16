<?php 
     include "../../modal/pdo.php";
     include "../cartController.php";

    if(isset($_POST['idPro'])) {
       $idPro = (int)$_POST['idPro'];
       $cartId = (int)$_POST['cartId'];
       $sizeId = (int)$_POST['btn-size'];
       $colorId = (int)$_POST['btn-color'];

       $checkPro = checkProCart($idPro,$cartId,$sizeId,$colorId);

       if($checkPro) {
          updateQuantilyProCart($checkPro['id']);
          echo json_encode(1);
          return;
       }


       $result = insertProCart($idPro,$cartId,$sizeId,$colorId);
       if($result) {
            echo json_encode(1);
       }else {
            echo json_encode(0);
       }

    }
?>