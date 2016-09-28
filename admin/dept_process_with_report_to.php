
<?php
require_once('../config.php');
require_once('auth.php');
$selected=$_POST['selected'];
$resultid = mysql_query("SELECT * FROM brand where cat_id=$selected");
while($fetch = mysql_fetch_array($resultid)){
echo "<option  value='".$fetch['brand_id']."'>".$fetch['brand_name']."</option>";
}
?>