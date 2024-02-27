<?php 
include("db.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr><th>id</th><th>Name</th><th>Pwd</th></tr>
        
<?php
    $sql="SELECT * FROM encdec";
    $res=mysqli_query($db,$sql);
    $i=1;
    while($row=mysqli_fetch_assoc($res)){
        $name=$row['username'];
        $pwd=$row['password'];
        $iv=hex2bin($row['iv']);

        $name=str_openssl_dec($name,$iv);
        $pwd=str_openssl_dec($pwd,$iv);

        ?>
            <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $name;?></td>
                <td><?php echo $pwd;?></td>
            </tr>
        <?php
    }
?>
        </table>
</body>
</html>