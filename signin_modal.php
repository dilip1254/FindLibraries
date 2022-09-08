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
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO login (name,email,password) VALUES ('$name','$email','$password')";

$result = mysqli_query($conn,$sql);
if(!$result){
    echo "Error:" . mysqli_error($conn);
    exit;
}

echo "Registration successful";
?>
please continue to <a href="loginmodal.html">login</a>
<?php
mysqli_close($conn);
?>