<?php include('dbconnect.php'); 
$ip1 = $_SERVER['HTTP_CLIENT_IP']?$_SERVER['HTTP_CLIENT_IP']:($_SERVER['HTTP_X_FORWARDE‌​D_FOR']?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR']);
$sitename = "WebsiteNaam";
if ($_GET['ID']){
	$movieID = $_GET['ID'];	
	 if ($_GET['vote']){
		 $Avote = $_GET['vote'];
		$qvote1 = "SELECT * FROM Votes WHERE movieid = '$movieID' AND ip = '$ip1'";
		$vote1 = mysqli_query($conn,$qvote1);
		$checkvote1 = mysqli_num_rows($vote1);
		if ($checkvote1 == 0) {
			if ($Avote == "like") {
				$addV = "INSERT INTO Votes (movieid, ip, info) VALUES ('$movieID', '$ip1', '$Avote')";
				mysqli_query($conn,$addV) or die(mysqli_error($conn));
				$sqllike = "UPDATE Video SET alike = alike + 1 WHERE ID = '$movieID'";
				mysqli_query($conn,$sqllike) or die(mysqli_error($conn));
				echo"Thank you for your vote LIKE";
			}
			elseif ($Avote == "dislike") {
				$addV = "INSERT INTO Votes (movieid, ip, info) VALUES ('$movieID', '$ip1', '$Avote')";
	mysqli_query($conn,$addV) or die(mysqli_error($conn));
				$sqllike = "UPDATE Video SET dislike = dislike + 1 WHERE ID = '$movieID'";
				mysqli_query($conn,$sqllike) or die(mysqli_error($conn));
				echo"Thank you for your vote DISLIKE";
				echo"<A HREF=\"javascript:location.reload(-2)\">Click to refresh the page</A>";
				
			}
			else {
				echo"No such vote";
			}
		}
		else {
			echo"You already voted on this video";
		}
	 }
	else {
	$qwatch1 = "SELECT * FROM Video WHERE ID = '$movieID'";
	$watch1 = mysqli_query($conn,$qwatch1);
	$checken1 = mysqli_num_rows($watch1);
	if ($checken1 > 0){
		while($row = mysqli_fetch_assoc($watch1)) {
			$qvote1 = "SELECT * FROM Votes WHERE movieid = '$movieID' AND ip = '$ip1'";
			$vote1 = mysqli_query($conn,$qvote1);
			$checkvote1 = mysqli_num_rows($vote1);
			if ($checkvote1 == 0) {
				echo"<table border=\"0\" align=\"center\" cellspacing=\"0\" cellpadding=\"5\" style=\"max-height: 100%\">
				<tr><td align=\"center\" valign=\"top\" width=\"50%\"><a href=\"like.php?ID=$movieID&vote=like\"><img src=\"images/like.png\" width=\"100%\"></a><br><strong>$row[alike]</strong></td><td align=\"center\" width=\"50%\" valign=\"top\"><a href=\"like.php?ID=$movieID&vote=dislike\"><img src=\"images/dislike.png\" width=\"100%\"></a><br><strong>$row[dislike]</strong></td></tr>
				</table>";
			}
			else {
				echo"<table border=\"0\" align=\"center\" cellspacing=\"0\" cellpadding=\"5\" style=\"max-height: 100%\">
				<tr><td align=\"center\" width=\"50%\" valign=\"top\"><img src=\"images/like.png\" width=\"100%\"><br><strong>$row[alike]</strong></td><td align=\"center\" width=\"50%\" valign=\"top\"><img src=\"images/dislike.png\" width=\"100%\"><br><strong>$row[dislike]</strong></td></tr>
				</table>";	
			}

		}
	}
	else {
 			echo "No such movie was found";
	}
}
}
else {
	echo"There was no movie selected";
}
?>
