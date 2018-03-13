

  <?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "livetable");
$query = "SELECT * FROM pdetails";
$result = mysqli_query($connect, $query);
$output = array();
while($row = mysqli_fetch_assoc($result))
{
 $output[] = $row;
}
echo json_encode($output);
?>
