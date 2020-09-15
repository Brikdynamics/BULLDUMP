<?php include('dbconnect.php'); 
$title = "Website Titel";
$sitename = "WebsiteNaam";

if ($_GET['x']){
	$adminpass = $_POST['code'];
	$realpass = 4611;
	if ($adminpass == $realpass) {
		echo"<strong>Passcode Accepted</strong><br>";
		echo"<a href=\"addmovie.php\">Add Movie</a><br>";
		echo"<a href=\"addcategory.php\">Add Category</a>";
	}
	else {
		echo"Niet zo goed";
		echo"<a href=\"index.php\">Ga terug</a>";
	}
}
else {
	echo"<form action=\"admin.php?x=y\" method=\"post\">
	<table>
		<tr>
      		<td align=\"right\" valign=\"top\">Passcode</td>
      		<td align=\"left\"><input type=\"text\" name=\"code\"></td>
    	</tr>
	   	<tr>
      		<td align=\"right\" valign=\"top\">&nbsp;</td>
      		<td align=\"left\"><input type=\"submit\" value=\"Let me in\"></td>
    	</tr>
	</table></form>";
}
?>