
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

echo $category = clean($_POST['category']);
echo $brand = clean($_POST['brand']);
echo $name = clean($_POST['name']);
echo $price = clean($_POST['price']);
echo $description = clean($_POST['description']);

$qry = "INSERT INTO products(cat_id, brand_id, p_name,  p_price, description) VALUES('$category','$brand','$name','$price','$description')";
$result = @mysql_query($qry);

if($result)
{

$_SESSION['success']=1;
header("location:create_user.php");
}

else
{
echo "Query Fail";
}

?>

  