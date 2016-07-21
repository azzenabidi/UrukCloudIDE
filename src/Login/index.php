<!DOCTYPE HTML>
<html>
<head>
<title>Welcome to UrukCloudIDE - IDE for the masses</title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/structure.css">
<style>
p{
  margin-bottom: 40px;
  font-weight: bold;
  font-size: 16px;
}
#ffff{
color:red;
font-weight: bold;
font-size:15px;
margin-left:50px;
}
#toplogo{

margin-top:  60px;
margin-left: 630px;
margin-right: 700px;
}
</style>
</head>

<body>
<div class="page-header" id="toplogo">
 <a href="https://github.com/azzenovic/UrukCloudIDE" target="_blank"><img src="/UrukCloudIDE/src/public/img/UCIDE-logo.png" class="img-thumbnail"  width="100" height="100"></a>
 </div>
<form class="box login" name="login"  action="index.php?login_attempt=true" method="post">

	<fieldset class="boxBody">
	  <label>Username</label>
	  <input type="text" tabindex="1" placeholder="Enter your username"  id="username" name="username">
	 <label>Password</label>
	  <input type="password" tabindex="2" placeholder="Enter your password" id="pwd" name="pwd">
	 <fieldset id="ffff"><?php

require_once(__DIR__.'/../../vendor/autoload.php');
use UrukCloudIDE\Controller\Admin_Controller;
use UrukCloudIDE\Controller\User_Controller;

if (isset($_GET['login_attempt'])) {
    $admin=new Admin_Controller();

    $user=new User_Controller();
    $id=$_POST['username'];
    $pwd=$_POST['pwd'];
    $admin->admin_connect_action($id, $pwd);
    $user->user_connect_action($id, $pwd);
}

?>
</fieldset>
	</fieldset>

	<footer>
	  <label><input type="checkbox" tabindex="3">Keep me logged in</label>
	  <input type="submit" class="btnLogin" value="Login" tabindex="4" id="lol">

	</footer>
</form>
<footer id="main" class="text-muted">
 <p>Proudly powered by <a href="https://urukproject.org/en.html" target="_blank">Uruk Project</a>
</p></footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</body>
</html>
