<?php 
include("db.php");

if(isset($_POST['submit'])){
    $iv=openssl_random_pseudo_bytes(16);
    
    $name=$_POST['username'];
    $pwd=$_POST['pwd'];
    
    $name=str_openssl_enc($name,$iv);
    $pwd=str_openssl_enc($pwd,$iv);
    $iv=bin2hex($iv);

    echo $sql="INSERT INTO encdec(username,password,iv) VALUES('$name','$pwd','$iv')";
    $res=mysqli_query($db,$sql);
    if($res){
        echo "Inserted";
    }else{
        echo "Could not insert";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="POST">

        <table border="1">
            <tr>
                <td>Name</td>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="pwd" id="pwd"></td>
            </tr>
            <tr>
                <td>Submit</td>
                <td><input type="submit" value="Submit" name="submit"></td>
            </tr>
        </table>
    </form>
</body>
</html>