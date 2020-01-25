<!DOCTYPE html>
<html>
<head>
<title>Join FashTek</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style/style.css">
</head>
<body>
<form action="register.php" method="post">
  <h2>Register Form</h2>
  
  <div class="input-container">
  <i class="fa fa-user icon"></i>
  <input class="input-field" type="text" placeholder="First name" name="fname" required>
  </div>
  
  
  <div class="input-container">
  <i class="fa fa-user icon"></i>
  <input class="input-field" type="text" placeholder="Last name" name="lname" required>
  </div>
  
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Username" name="username" required>
  </div>

  <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="text" placeholder="Email" name="email" required>
  </div>

  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" required name="password">
  </div>

<div class="custom-select" style="width:200px;">
Gender:
  <select name="gender" required>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select>
</div>
<br>

  <button type="submit" class="btn" name="join">Register</button>
</form>



<script type="text/javascript" src="js/script.js"></script>
</body>
</html>