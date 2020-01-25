<?php
session_start();
if(!isset($_SESSION['username'])){
header('location:login.php');
}
$username=$_SESSION['username'];
$userid=$_SESSION['user_Id'];
?>
<!DOCTYPE html>
<html>
<head>
<title></title>
<link rel="stylesheet" href="style/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="icon-bar">
  <a class="active" href="#"><i class="fa fa-home"></i></a> 
  <a href="#"><i class="fa fa-search"></i></a> 
  <a href="#"><i class="fa fa-envelope"></i></a> 
  <a href="#"><i class="fa fa-globe"></i></a>
<?php echo ' <a href="profile.php?user='.$userid.'"><i class="fa fa-user-circle-o"></i></a>';?>
  <a href="#" ><i class="fa fa-trash" style="font-size:24px"></i> </a>
</div>
<br>
<div class="alert">
<?php echo "Hi" . " ". $username;?>
</div>
<strong>Upload your latest designs</strong><br>
<form action="upload.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="user" value=<?php echo $userid;?> >
<textarea placeholder="Description" name="title"  required></textarea>
<label for="fileUpload">Upload file</label><br>
 <input type="file" id="fileUpload" name="image"><br>
<button name="upload" name="upload">Upload</button>
</form>
<br>
<h4>Recent Posts</h4>
<?php
include "db/db.php";
$sql = "select * from tblaccount as tb join tblpost as tp on tb.user_Id=tp.user_Id order by post_Id desc";
$re = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($re)){
$postid = $row['post_Id'];
$use = $row['user_Id'];
$title =$row['title'];
$image = $row['image'];
$u = $row['username'];
$type = -1;


                    // Checking user status
                    $status_query = "SELECT count(*) as cntStatus,type FROM like_unlike WHERE userid=".$userid." and postid=".$postid;
                    $status_result = mysqli_query($conn, $status_query);
                    $status_row = mysqli_fetch_array($status_result);
                    $count_status = $status_row['cntStatus'];
                    if($count_status > 0){
                        $type = $status_row['type'];
                    }
                    
                    
                   
                    
                    
                    // Count post total likes and unlikes
                    $like_query = "SELECT COUNT(*) AS cntLikes FROM like_unlike WHERE type=1 and postid=".$postid;
                    $like_result = mysqli_query($conn,$like_query);
                    $like_row = mysqli_fetch_array($like_result);
                    $total_likes = $like_row['cntLikes'];
                    
                    $unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM like_unlike WHERE type=0 and postid=".$postid;
                    $unlike_result = mysqli_query($conn,$unlike_query);
                    $unlike_row = mysqli_fetch_array($unlike_result);
                    $total_unlikes = $unlike_row['cntUnlikes'];
                    
                    ?>
                    
             
             <div class="card">
             <?php echo "
             <img src='uploads/".$image."' alt='Avatar' style='width:100%'>";
             ?>
             <div class="container">
             <?php echo'
             <h4><b><a href="user.php?user='.$use.'">';?><?php echo $u; ?></a></b></h4> 
             <p><?php echo $title; ?></p> 
             </div>
            
             <div class="post-action">
             
             <button type="button" value="Like" id="like_<?php echo $postid; ?>" class="like" style="<?php if($type == 1){ echo "color: #ffa449;"; } ?>" ><i class="fa fa-thumbs-o-up"></i>&nbsp;(<span id="likes_<?php echo $postid; ?>"><?php echo $total_likes; ?></span>)&nbsp;
             </button>
             <button type="button" value="Unlike" id="unlike_<?php echo $postid; ?>" class="unlike" style="<?php if($type == 0){ echo "color: #ffa449;"; } ?>" ><i class="fa fa-thumbs-o-down"></i>&nbsp;(<span id="unlikes_<?php echo $postid; ?>"><?php echo $total_unlikes; ?></span>)
             </button>   
             </div>
             </div>
             </div>
             <br>
             <?php
             }
             ?>


<script src="js/jquery-3.3.1.js" type="text/javascript"></script>
<script src="js/like.js" type="text/javascript"></script>
<script type="text/javascript" src="js></script>
</body>
</html>