<?php
session_start();

$db_hostname = "localhost";
$db_username = "root";
$db_password = "root";
$db_name = "lib";

$conn = mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
if(!$conn){
    echo "Connection Failed:".mysqli_connect_error();
    exit;
}
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    $row = mysqli_fetch_assoc($result);
    if ($row) {

        echo "Hello " . $row['name'] . "<br/>";

        $_SESSION['user_id']=$row['id'];
        $_SESSION['name']=$row['name'];

        setcookie("user_id",$row['id'],time()+3600);
        setcookie("name",$row['name'],time()+3600);
        
        ?>
        <a href="dashboard.php">click here</a>
        <?php
    } else {
        echo "Login Failed";
    }

    mysqli_close($conn);
?>