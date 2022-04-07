<?php
include "db_connect.php";

if(isset($_POST["limit"], $_POST["start"]))
{
$limit=$_POST["limit"];
$start=$_POST["start"];

}
else{
 $limit=10;
 $start=1;
}
 $query = "SELECT * FROM students LIMIT ".$start.",".$limit."";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_array($result))
{
echo ' <h3>'.$row["students_id"].'</h3>
<p>'.$row["students_name"].'</p>
<hr />
';}


?>