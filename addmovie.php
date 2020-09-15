<?php include('dbconnect.php'); 
$title = "Website Titel";
$sitename = "WebsiteNaam";

if ($_GET['x']){

$ytlink = $_POST['link'];
$youtubeID = str_replace("https://www.youtube.com/watch?v=","","$ytlink");
$Mlink = "http://www.youtube.com/embed/$youtubeID?rel=0&amp;showinfo=0";
$Mthumb = "http://i.ytimg.com/vi/$youtubeID/0.jpg";
$Mcategory = $_POST['menu'];
$Msubcategory = $_POST['submenu'];
$Mauthor = $_POST['author'];
$Mtitle = $_POST['title'];
$Minfo = $_POST['info'];
$Mdate = date("F j, Y H:i:s");

echo "Gaat goed 1";
echo "$Mtitle $Minfo";

$addM = "INSERT INTO Video (category, subcat, date, author, title, info, link, thumb) VALUES ('$Mcategory', '$Msubcategory', '$Mauthor', '$Mdate', '$Mtitle', '$Minfo', '$Mlink', '$Mthumb')";
	mysqli_query($conn,$addM) or die(mysqli_error($conn));
	echo "Submenu $Mtitle was added to the $Msubcategory of $Mcategory<br>";
	echo "<a href=\"index.php\">Back to the homepage</a> - <a href=\"addmovie.php\">Add anoter movie</a>";
}
else {
	?>
<form action="addmovie.php?x=y" method="post">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td colspan="2" align="center"><strong>Add Movie Instantly</strong></td>
    </tr>
    <tr>
      <td align="right">Category</td>
      <td align="left"><select name="menu">
		  <option value="Animals">Animals</option>
		  <option value="BabyKids">Baby n Kids</option>
		  <option value="Inventors">Inventors</option>
		  <option value="Lifehacks">Life-Hacks</option>
		  <option value="Failures">Failures</option>
		  <option value="Sports">Sports</option>
		  <option value="Others">Others</option>
		  </select></td>
    </tr>
    <tr>
<td align="right" valign="top">Sub-Category</td>
      <td align="left"><select name="submenu">
<?php
			$query2 = "SELECT * FROM Category ORDER BY menu ASC";
			$subcat = mysqli_query($conn,$query2);
			$aantalsubcat = mysqli_num_rows($subcat);
			if ($aantalsubcat > 0){
				while($row = mysqli_fetch_assoc($subcat)) {
					$subcatID = $row['ID'];
					$subcatMenu = $row['menu'];
					$subcatname = $row['name'];
					echo"<option value=\"$subcatID\">$subcatMenu- $subcatname</option>"; 	
				}
			}
			else {
				echo"No subcategory yet";
			}
			?>
</td>
    </tr>
	      <tr>
      <td align="right" valign="top">Author</td>
      <td align="left"><input type="text" name="author"></td>
    </tr>
	      <tr>
      <td align="right" valign="top">Title</td>
      <td align="left"><input type="text" name="title"></td>
    </tr>
	      <tr>
      <td align="right" valign="top">Info</td>
      <td align="left"><input type="text" name="info"></td>
    </tr>
	      <tr>
      <td align="right" valign="top">* Youtube - Link *</td>
      <td align="left"><input type="text" name="link"></td>
    </tr>
	   <tr>
      <td align="right" valign="top">&nbsp;</td>
      <td align="left"><input type="submit" value="Add Movie"></td>
    </tr>
  </tbody>
</table>
</form>
<?
}
?>