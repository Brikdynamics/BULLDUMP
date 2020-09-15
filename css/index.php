<?php include('dbconnect.php'); 
$sitename = "bullDUMP";
?>
<html>
<head>
<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap-4.0.0.css" rel="stylesheet" type="text/css">
</head>

<body style="padding-top: 70px">
<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #2e8808"> <a class="navbar-brand" href="addcategory.php"><?php echo $sitename; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent1">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Animals </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> 
			<?php
			$query1 = "SELECT * FROM Category WHERE menu = 'Animals'";
			$animals = mysqli_query($conn,$query1);
			$aantalanimals = mysqli_num_rows($animals);
			if ($aantalanimals > 0){
				while($row = mysqli_fetch_assoc($animals)) {
					$animalID = $row['ID'];
					$animalname = $row['name'];
						$qcat1 = "SELECT * FROM Video WHERE subcat = '$animalID'";
						$subcat1 = mysqli_query($conn,$qcat1);
						$aantalsubcat1 = mysqli_num_rows($subcat1);
					echo"<a class=\"dropdown-item\" href=\"index.php?page=movies&category=$animalID\">$animalname ($aantalsubcat1)</a>"; 	
				}
			}
			else {
				echo"No videos yet";
			}
			?>
         </div>
      </li>
		<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Babys &amp; Kids </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> 
			<?php
			$query2 = "SELECT * FROM Category WHERE menu = 'BabyKids'";
			$babykids = mysqli_query($conn,$query2);
			$aantalbabykids = mysqli_num_rows($babykids);
			if ($aantalbabykids > 0){
				while($row = mysqli_fetch_assoc($babykids)) {
					$babykidsID = $row['ID'];
					$babykidsname = $row['name'];
						$qcat2 = "SELECT * FROM Video WHERE subcat = '$babykidsID'";
						$subcat2 = mysqli_query($conn,$qcat2);
						$aantalsubcat2 = mysqli_num_rows($subcat2);
					echo"<a class=\"dropdown-item\" href=\"index.php?page=movies&category=$babykidsID\">$babykidsname ($aantalsubcat2)</a>"; 	
				}
			}
			else {
				echo"No videos yet";
			}
			?>
         </div>
      </li>
		<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Inventors </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> 
			<?php
			$query3 = "SELECT * FROM Category WHERE menu = 'Inventors'";
			$inventors = mysqli_query($conn,$query3);
			$aantalinventors = mysqli_num_rows($inventors);
			if ($aantalinventors > 0){
				while($row = mysqli_fetch_assoc($inventors)) {
					$inventorID = $row['ID'];
					$inventorname = $row['name'];
						$qcat3 = "SELECT * FROM Video WHERE subcat = '$inventorID'";
						$subcat3 = mysqli_query($conn,$qcat3);
						$aantalsubcat3 = mysqli_num_rows($subcat3);
					echo"<a class=\"dropdown-item\" href=\"index.php?page=movies&category=$inventorID\">$inventorname ($aantalsubcat3)</a>"; 	
				}
			}
			else {
				echo"No videos yet";
			}
			?>
         </div>
      </li>
		<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Failures </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> 
			<?php
			$query4 = "SELECT * FROM Category WHERE menu = 'Failures'";
			$failures = mysqli_query($conn,$query4);
			$aantalfailures = mysqli_num_rows($failures);
			if ($aantalfailures > 0){
				while($row = mysqli_fetch_assoc($failures)) {
					$failureID = $row['ID'];
					$failurename = $row['name'];
						$qcat4 = "SELECT * FROM Video WHERE subcat = '$failureID'";
						$subcat4 = mysqli_query($conn,$qcat4);
						$aantalsubcat4 = mysqli_num_rows($subcat4);
					echo"<a class=\"dropdown-item\" href=\"index.php?page=movies&category=$failureID\">$failurename ($aantalsubcat4)</a>"; 	
				}
			}
			else {
				echo"No videos yet";
			}
			?>
         </div>
      </li>
		<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Life-Hacks </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> 
			<?php
			$query5 = "SELECT * FROM Category WHERE menu = 'Lifehacks'";
			$lifehacks = mysqli_query($conn,$query5);
			$aantallifehacks = mysqli_num_rows($lifehacks);
			if ($aantallifehacks > 0){
				while($row = mysqli_fetch_assoc($lifehacks)) {
					$lifehackID = $row['ID'];
					$lifehackname = $row['name'];
						$qcat5 = "SELECT * FROM Video WHERE subcat = '$lifehackID'";
						$subcat5 = mysqli_query($conn,$qcat5);
						$aantalsubcat5 = mysqli_num_rows($subcat5);
					echo"<a class=\"dropdown-item\" href=\"index.php?page=movies&category=$lifehackID\">$lifehackname ($aantalsubcat5)</a>"; 	
				}
			}
			else {
				echo"No videos yet";
			}
			?>
         </div>
      </li>
		<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Sports </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> 
			<?php
			$query6 = "SELECT * FROM Category WHERE menu = 'Sports'";
			$sports = mysqli_query($conn,$query6);
			$aantalsports = mysqli_num_rows($sports);
			if ($aantalsports > 0){
				while($row = mysqli_fetch_assoc($sports)) {
					$sportID = $row['ID'];
					$sportname = $row['name'];
						$qcat6 = "SELECT * FROM Video WHERE subcat = '$sportID'";
						$subcat6 = mysqli_query($conn,$qcat6);
						$aantalsubcat6 = mysqli_num_rows($subcat6);
					echo"<a class=\"dropdown-item\" href=\"index.php?page=movies&category=$sportID\">$sportname ($aantalsubcat6)</a>"; 	
				}
			}
			else {
				echo"No videos yet";
			}
			?>
         </div>
      </li>
		<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Others </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> 
			<?php
			$query7 = "SELECT * FROM Category WHERE menu = 'Others'";
			$others = mysqli_query($conn,$query7);
			$aantalothers = mysqli_num_rows($others);
			if ($aantalothers > 0){
				while($row = mysqli_fetch_assoc($others)) {
					$otherID = $row['ID'];
					$othername = $row['name'];
						$qcat7 = "SELECT * FROM Video WHERE subcat = '$otherID'";
						$subcat7 = mysqli_query($conn,$qcat7);
						$aantalsubcat7 = mysqli_num_rows($subcat7);
					echo"<a class=\"dropdown-item\" href=\"index.php?page=movies&category=$otherID\">$othername ($aantalsubcat7)</a>"; 	
				}
			}
			else {
				echo"No videos yet";
			}
			?>
         </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.0.0.js"></script>

<?php
if ($_GET['page'] == 'movies') {
 include('movies.php');
}
	elseif ($_GET['page'] == 'watch') {
 include('watch.php');
}

?>
</body>
</html>
