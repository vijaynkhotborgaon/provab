<?php
require_once('../config.php');
require_once('auth.php');
?>
<div style="margin-top:50px;background-color:black;padding:20px;">
<?php
	$admin_row = mysql_query("SELECT * FROM users where user_id=".$_SESSION['SESS_ADMIN']);
	$admin = mysql_fetch_array($admin_row);
	
	echo "<span style='background-color:#FAFAD2;color:black;padding:10px;margin-top:50px;'><b>".$admin['name']." | ".$admin['email_admin']."</b></span>"; 
?>
     
<a href="logout.php" style="background-color:#DEB887;color:black;padding:10px;border:5px solid #008B8B;border-radius:10px;text-align:right;margin-left:72%;"><b> Logout</b></a>
                            
</div>					
           
     