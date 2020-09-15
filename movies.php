<?php include('dbconnect.php'); 
$title = "BULLDUMP";
$sitename = "BULLDUMP";

if ($_GET['category']){
	$qcategory = $_GET['Category'];
	$query3 = "SELECT * FROM Category WHERE name = '$qcategory' ORDER BY ID ASC";
	$movies = mysqli_query($conn,$query3);
	$aantalmovies = mysqli_num_rows($movies);
		
	if ($aantalmovies > 0){
		echo"<table align=\"center\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">
	<tr valign=\"top\">";
		$i = 0;
		
		while($row = mysqli_fetch_assoc($movies)) {
				if($i < '4'){
					echo"<td width=\"25%\">
			<table align=\"center\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">
			<tr><td align=\"center\" bgcolor=\"#2e8808\"><a href=\"index.php?page=watch&ID=$row[ID]\" style=\"color: black\"><strong>$row[title]</strong></a></td></tr>
			<tr><td align=\"center\"><a href=\"index.php?page=watch&ID=$row[ID]\"><img src=\"$row[thumb]\" style=\"max-width: 100%; min-width: 80%\"></a></td></tr>
			<tr><td align=\"center\"><strong>$row[alike]</strong> likes</td></tr>
			</table>
		</td>";
					$i++;
				}
			else {
			$i = 0;
			echo"</tr><tr valign=\"top\"><td width=\"25%\">
			<table align=\"center\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">
			<tr><td align=\"center\" bgcolor=\"#2e8808\"><a href=\"index.php?page=watch&ID=$row[ID]\" style=\"color: black\"><strong>$row[title]</strong></a></td></tr>
			<tr><td align=\"center\"><a href=\"index.php?page=watch&ID=$row[ID]\"><img src=\"$row[thumb]\" style=\"max-width: 100%; min-width: 80%\"></a></td></tr>
			<tr><td align=\"center\"><strong>$row[alike]</strong> likes</td></tr>
			</table>
		</td>";
				$i++;
			}
		}
echo"</tr></table>";
	}
	else {
		echo"No videos yet";
	}
}
else {
 echo "Select a category!";
}
?>
<a style="background-color: #024700"
