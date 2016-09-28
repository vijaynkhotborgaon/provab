<?php
require_once('../config.php');
session_start();
if(isset($_SESSION['SESS_ADMIN']) || (trim($_SESSION['SESS_ADMIN']) != '') ) {
header("location: index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<title>Admin Dashboard</title>
<head>
<style>
.login-block {
    width: 320px;
    padding: 20px;
    background: #BDBDBD;
    border-radius: 5px;
    margin: 5px auto;
}
.login-block h1 {
    text-align: center;
    color: #000;
    margin-top: 0;
    margin-bottom: 20px;
}
.login-block input {
    width: 100%;
    height: 42px;
    margin-bottom: 20px;
    padding: 0 5px 0 5px;
 }
.login-block button {
    width: 30%;
    height: 40px;
    background:gray;
    border-radius: 10px;
    color: white;
    cursor: pointer;
}
</style>
</head>
<div class="logo"></div>
<div class="login-block" style="background-color:black;">
<p style="color:white;">Username : admin</p>
<p style="color:white;">Password : abc123</p>
</div>
<div class="login-block" style="background-color:black;">
<h1 style="color:white;">Admin</h1>
<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
foreach($_SESSION['ERRMSG_ARR'] as $msg) { ?>
<div id="system-message">
<?php
echo "<p id='error_msg' style='color:red;'>",$msg,"</p>"; 
}
?>
</div>
<?php
unset($_SESSION['ERRMSG_ARR']);
}
?>
	<form action="loginprocess.php" method="post" >
    <input type="text" name="username" id="username" value="" class="username" placeholder="Username" style="margin-bottom:10px;margin-top:10px;"/>
    <input type="password" name="password" id="password" value="" class="password" placeholder="Password" style="margin-bottom:10px;margin-top:10px;"/>
    <center><button type="submit" style="margin-bottom:10px;margin-top:10px;"><b>LOGIN<b></button></center>
</form>
</div>
</html>