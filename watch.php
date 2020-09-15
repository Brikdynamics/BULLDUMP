<?php include('dbconnect.php'); 
$sitename = "BullDUMP";
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap-4.0.0.css" rel="stylesheet" type="text/css">
</head>
<?php
if ($_GET['ID']){
	$movieID = $_GET['ID'];
	$qwatch1 = "SELECT * FROM Video WHERE ID = '$movieID'";
	$watch1 = mysqli_query($conn,$qwatch1);
	$checken1 = mysqli_num_rows($watch1);
	if ($checken1 > 0){
		while($row = mysqli_fetch_assoc($watch1)) {
			echo"<img src=\"$row[thumb]\" style=\"display: none\">";
			echo"<title> $row[title] </title>";
			echo"<meta name=\"description\" content=\"$row[info]\">";
			echo"<iframe height=\"80%\" class=\"container-fluid\" src=\"$row[link]\" scrolling=\"0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>
			<div width=\"100%\" align=\"center\" style=\"backgroundcolor: grey\">$row[info]</div>
			";
			echo"<table align=\"center\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">
			<tr><td align=\"center\" width=\"25%\" style=\"max-width: 200\">";
			
			$prevsubcat = $row[subcat];
			$qprev1 = "SELECT * FROM Video WHERE ID < '$movieID' AND subcat = '$prevsubcat' ORDER BY ID DESC LIMIT 1";
			$prevwatch1 = mysqli_query($conn,$qprev1);
			$previous1 = mysqli_num_rows($prevwatch1);
			if ($previous1 > 0){
			while($previd = mysqli_fetch_assoc($prevwatch1)) {
			echo"<table align=\"center\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">
			<tr><td align=\"center\" bgcolor=\"#2e8808\"><a href=\"index.php?page=watch&ID=$previd[ID]\" style=\"color: black\"><strong>$previd[title]</strong></a></td></tr>
			<tr><td align=\"center\"><a href=\"index.php?page=watch&ID=$previd[ID]\"><img src=\"$previd[thumb]\" style=\"max-width: 100%; min-width: 80%\"></a></td></tr>
			<tr><td align=\"center\" style=\"color: #024700; background-color: #53FF46\">$previd[info]</td></tr>
			<tr><td align=\"center\"><strong>$previd[alike]</strong> liked this</td></tr>
			</table>";
			}
			}
			else {
			echo"No previous movies";
			}
			
			echo"</td><td align=\"center\" width=\"50%\" valign=\"top\">";
			echo"<iframe class=\"container-fluid\" src=\"like.php?ID=$movieID\" scrolling=\"0\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen></iframe>";
			
			echo"</td><td align=\"center\" width=\"25%\" style=\"max-width: 200\">";
			
			$nextsubcat = $row[subcat];
			$qnext1 = "SELECT * FROM Video WHERE subcat = '$nextsubcat' AND ID > '$movieID' ORDER BY ID ASC LIMIT 1";
			$nextwatch1 = mysqli_query($conn,$qnext1);
			$next1 = mysqli_num_rows($nextwatch1);
			if ($next1 > 0){
			while($nextid = mysqli_fetch_assoc($nextwatch1)) {
			echo"<table align=\"center\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">
			<tr><td align=\"center\" bgcolor=\"#2e8808\"><a href=\"index.php?page=watch&ID=$nextid[ID]\" style=\"color: black\"><strong>$nextid[title]</strong></a></td></tr>
			<tr><td align=\"center\"><a href=\"index.php?page=watch&ID=$nextid[ID]\"><img src=\"$nextid[thumb]\" style=\"max-width: 100%; min-width: 80%\"></a></td></tr>
			<tr><td align=\"center\" style=\"color: #024700; background-color: #53FF46\">$nextid[info]</td></tr>
			<tr><td align=\"center\"><strong>$nextid[alike]</strong> liked this</td></tr>
			</table>";
			}
			}
			else {
			echo"No following movies";
			}
			echo"</td></tr></table>";
			}

		}
		else {
 			echo "No such movie was found";
		}
}
else {
	echo"There was no movie selected";
}
?>
