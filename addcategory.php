<?php include('dbconnect.php'); 
$title = "Website Titel";
$sitename = "WebsiteNaam";


if ($_GET['x']){
$Cmenu = $_POST['menu'];
$Cname = $_POST['name'];
$Cinfo = $_POST['info'];
$addC = "INSERT INTO Category (menu, name, info) VALUES ('$Cmenu', '$Cname', '$Cinfo')";
	mysqli_query($conn,$addC) or die(mysqli_error($conn));
	echo "Submenu $Cname was added to the $Cmenu category<br>";
	echo "<a href=\"index.php\">Back to the homepage</a> - <a href=\"addcategory.php\">Add anoter category</a>";
}
else {
	?>
<form action="addcategory.php?x=y" method="post">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td colspan="2" align="center"><strong>Add Category Instantly</strong></td>
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
      <td align="right" valign="top">Sub-category</td>
      <td align="left"><input type="text" name="name"><br>&#40;This is what gets added&#41;</td>
    </tr>
	      <tr>
      <td align="right" valign="top">Information</td>
      <td align="left"><input type="text" name="info"></td>
    </tr>
	   <tr>
      <td align="right" valign="top">&nbsp;</td>
      <td align="left"><input type="submit" value="Add Category"></td>
    </tr>
  </tbody>
</table>
</form>
<?
}
?>