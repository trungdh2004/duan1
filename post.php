<?php
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="color" name="color">
        <button type="submit" name="btn">save</button>
    </form>

    <script>
        const input = document.querySelector("input");
        const button = document.querySelector("button");

        button.addEventListener("click",() => {
            console.log(input.value);
        })
    </script>
</body>
</html>

<?php 
    if(isset($_POST['btn'])){
        echo $_POST['color'];
    }
?>