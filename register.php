<?php

include "db/db.php";

if(isset($_POST['join'])){
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$password = md5($password);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);

$user_check_query = "select * from tblaccount where username='$username' or email='$email' limit 1";
$result = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($result);
if($user){
 if ($user['username'] === $username) {
 echo "Username is exist";
}
if ($user['email'] === $email) {
echo "Email is exist";
}
}else{
$sql = "insert into tbluser (fname, lname, gender) values ('$fname', '$lname', '$gender')";
$query = mysqli_query($conn, $sql);
if($query){
$a = mysqli_query($conn, "select * from tbluser where fname='$fname'");
$aa = mysqli_fetch_array($a);

if($a){
$aaa = $aa['user_Id'];
$in = "insert into tblaccount (username, password, user_Id, email) values ('$username', '$password', '$aaa', '$email')";
$dn = mysqli_query($conn, $in);

if($dn == true){
echo "<script>";
echo "alert('Account Created, You can now Login')";
echo "<script>";
}
}
}
}
}
?>




