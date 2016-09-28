
<?php
session_start();
require_once('../config.php');
require_once('auth.php');
?>

<?php
function clean($str) {
$str = @trim($str);
if(get_magic_quotes_gpc()) {
$str = stripslashes($str);
}
return mysql_real_escape_string($str);
}
echo $p_id = clean($_GET['p_id']);

$qry = "DELETE FROM products WHERE p_id=".$p_id;
$result = @mysql_query($qry);

if($result)
{

$_SESSION['delete']=1;
header("location:create_user.php");
}

else
{
echo "Query Fail";
}

?>

  