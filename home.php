<?php include('dbconnect.php'); 

if ($_GET['view']) {
	$view = $_GET['view'];
	if ($view == "latest") {
	$q100latest = "SELECT * FROM Video ORDER BY ID DESC LIMIT 100";
	$lat100 = mysqli_query($conn,$q100latest);
	$aantalmovies = mysqli_num_rows($lat100);
		
	if ($aantalmovies > 0){
		echo"<table align=\"center\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">";
		echo"<tr valign=\"top\"><td colspan=\"4\" align=\"center\">100 LATEST ADDED<br><a href=\"index.php\">Go back</a></td></tr>";
		echo"<tr valign=\"top\">";
		$i = 0;
		
		while($row = mysqli_fetch_assoc($lat100)) {
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
	}
	}
	elseif ($view == "best") {
		$q100best = "SELECT * FROM Video ORDER BY alike DESC LIMIT 100";
	$best100 = mysqli_query($conn,$q100best);
	$aantalmovies = mysqli_num_rows($best100);
		
	if ($aantalmovies > 0){
		echo"<table align=\"center\" width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">";
		echo"<tr valign=\"top\"><td colspan=\"4\" align=\"center\">TOP 100<br><a href=\"index.php\">Go back</a></td></tr>";
		echo"<tr valign=\"top\">";
		$i = 0;
		
		while($row = mysqli_fetch_assoc($best100)) {
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
	}
	}
	else {
		echo"Something went terribly wrong";
	}
	}
	else {
	echo"<table align=\"center\" width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"5\">
	<tr><td colspan=\"4\" align=\"center\" style=\"background-color: #62da1e\"><strong>Latest Videos</strong><a href=\"index.php?page=home&view=latest\"> view more..</a></td></tr><tr valign=\"top\">";

	$qlatest = "SELECT * FROM Video ORDER BY ID DESC LIMIT 4";
	$latest = mysqli_query($conn,$qlatest);
	$aantallatest = mysqli_num_rows($latest);
	if ($aantallatest > 0){
		while($row = mysqli_fetch_assoc($latest)) {
			echo"
					<td width=\"25%\" style=\"background-color: #80e646\">
						<table align=\"center\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">
						<tr><td align=\"center\" bgcolor=\"#2e8808\"><a href=\"index.php?page=watch&ID=$row[ID]\" style=\"color: black\"><strong>$row[title]</strong></a></td></tr>
						<tr><td align=\"center\"><a href=\"index.php?page=watch&ID=$row[ID]\"><img src=\"$row[thumb]\" style=\"max-width: 100%; min-width: 80%\"></a></td></tr>
						<tr><td align=\"center\" bgcolor=\"#EEE\"><strong>$row[alike]</strong> likes</td></tr>
						</table>
					</td>";
		}
	}
	else {
		echo"No videos yet";
	}

	echo"</tr></table><hr size=\"1\"><table align=\"center\" width=\"100%\" border=\"1\" cellspacing=\"0\" cellpadding=\"5\">
	<tr><td colspan=\"4\" align=\"center\" style=\"background-color: #62da1e\"><strong>Best Videos</strong><a href=\"index.php?page=home&view=best\"> view more..</a></td></tr><tr valign=\"top\">";

	$qbest = "SELECT * FROM Video ORDER BY alike DESC LIMIT 4";
	$best = mysqli_query($conn,$qbest);
	$aantalbest = mysqli_num_rows($best);
	if ($aantalbest > 0){
		while($row = mysqli_fetch_assoc($best)) {
			echo"
					<td width=\"25%\" style=\"background-color: #80e646\">
						<table align=\"center\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\">
						<tr><td align=\"center\" bgcolor=\"#2e8808\"><a href=\"index.php?page=watch&ID=$row[ID]\" style=\"color: black\"><strong>$row[title]</strong></a></td></tr>
						<tr><td align=\"center\"><a href=\"index.php?page=watch&ID=$row[ID]\"><img src=\"$row[thumb]\" style=\"max-width: 100%; min-width: 80%\"></a></td></tr>
						<tr><td align=\"center\" bgcolor=\"#EEE\"><strong>$row[alike]</strong> likes</td></tr>
						</table>
					</td>";
		}
	}
	else {
		echo"No videos yet";
	}
	echo"</tr></table>";
	}

?>
