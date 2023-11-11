

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button class="btn">btn </button>
    <script>
        const btn= document.querySelector('.btn');
        btn.addEventListener('click', function() {
            const data = ['trung','hien']
            const form =new FormData();
            form.append('x',JSON.stringify(data));
            fetch("/duan1_Nike/post.php",{
                method:"POST",
                headers:{
                    "Content-Type": "application/json; charset=utf-8"
                },
                body: JSON.stringify(data)
            })
            .then(res => {
                return res.json()
            })
            .then(res => {
                console.log(res);
            })


            
                
        })
    </script>
</body>
</html>
<?php 

$date = '2023-11-06 23:31:13';
var_dump(["name" => "trung"]);
echo date ('H:i:s - z m t Y r',strtotime($date));
?>