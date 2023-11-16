<?php 
    include "../modal/pdo.php";
    $getBanner = get_all_pdo("banner")[0];
    if(isset($_POST['post'])) {
        $image1 = $_FILES['image1'];
        $image2 = $_FILES['image2'];
        $image3 = $_FILES['image3'];
        $image4 = $_FILES['image4'];

        $image1_name = $getBanner['image1'];
        $image2_name = $getBanner['image2'];
        $image3_name = $getBanner['image3'];
        $image4_name = $getBanner['image4'];


        if($image1['size'] > 0) {
            $image1_name = time().$image1['name'];
            move_uploaded_file($image1['tmp_name'],"../images/".$image1_name);
        }
        if($image2['size'] > 0) {
            $image2_name = time().$image2['name'];
            move_uploaded_file($image2['tmp_name'],"../images/".$image2_name );
        }
        if($image3['size'] > 0) {
            $image3_name = time().$image3['name'];
            move_uploaded_file($image3['tmp_name'],"../images/".$image3_name );
        }
        if($image4['size'] > 0) {
            $image4_name = time().$image4['name'];
            move_uploaded_file($image4['tmp_name'],"../images/".$image4_name );
        }

        $sql = "UPDATE `banner` SET `image1`='$image1_name',`image2`='$image2_name',`image3`='$image3_name',`image4`='$image4_name' WHERE id = 1";

        $result = prepareSql($sql);

        if( $result) {
            echo '1';
        }else {
            echo '0';
        }
        
    }
?>