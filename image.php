<?php
session_start();
if(!isset($_SESSION['username'])){
header('location:login.php');
}

include "db/db.php";

if(isset($_POST['upload'])){
$user = mysqli_real_escape_string($conn, $_POST['user']);
$image = $_FILES['image']['name'];
// get the image extension
$extension = substr($image,strlen($image)-4,strlen($image));
// allowed extensions
$allowed_extensions = array(".jpg",".jpeg", ".PNG",".png",".gif",".GIF",".JPG",".JPEG");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg/png/jpeg/gif format allowed');</script>";
}
else
{
//rename the video file
$imgnewfile=$image;
// Code for move video nto directory
move_uploaded_file($_FILES["image"]["tmp_name"],"profile/".$imgnewfile);
// Query for insertion data into database

$sql = "insert into tblprof(user, image_p) values ('$user', '$image')";
$res = mysqli_query($conn, $sql);

if($res==true){
header('location:index.php');
}

}
}