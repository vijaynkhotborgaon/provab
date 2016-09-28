
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
$p_id = clean($_POST['p_id']);
$category = clean($_POST['cat_hidden']);
echo $brand = clean($_POST['brand']);
$name = clean($_POST['name']);
$price = clean($_POST['price']);
$description = clean($_POST['description']);



$qry = "UPDATE products SET cat_id='$category', brand_id='$brand', p_name='$name', p_price='$price', description='$description' WHERE p_id='$p_id'";
$result = @mysql_query($qry);

if($result)
{

$_SESSION['update']=1;
header("location:create_user.php");
}

else
{
echo "Query Fail";
}

?>

  