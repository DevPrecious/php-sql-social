<?php
session_start();

include "db/db.php";
if(isset($_POST['login'])){
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password=md5($password);

$sql = "select * from tblaccount where username='$username' and password='$password'";
$result = mysqli_query($conn, $sql);
$array = mysqli_fetch_array($result);

if($array['username']==$username){
$_SESSION['username'] = $username;
$_SESSION['fname'] = $array['fname'];
$_SESSION['lname'] = $array['lname'];
$_SESSION['user_Id'] = $array['user_Id'];
header('location:index.php');

}
else{
echo '<script language="javascript">';
echo 'alert("Incorrect username or password")';
echo '</script>';
}
}