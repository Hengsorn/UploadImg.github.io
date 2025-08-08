<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include 'db.php';
        $query_select = "SELECT * FROM tbl_img ";
        $query_select_run = mysqli_query($conn,$query_select);
        if(mysqli_num_rows($query_select_run)>0){
            foreach($query_select_run as $img){
                ?>
                <img style="width: 500px;" src="./upload/<?=$img['name']?>" alt="">
            <?php
            }
        }
    ?>
</body>
</html>
