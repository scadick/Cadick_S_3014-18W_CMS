<?php
	//ini_set('display_errors', 1);
	//error_reporting(E_ALL);
	require_once('admin/phpscripts/config.php');
	if(isset($_GET['filter'])){
		$tbl = "tbl_movies";
		$tbl2 = "tbl_genre";
		$tbl3 = "tbl_mov_genre";
		$col = "movies_id";
		$col2 = "genre_id";
		$col3 = "genre_name";
		$filter = $_GET['filter'];
		$getMovies = filterType($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter);
	}else{
		$tbl = "tbl_movies";
		$getMovies = getAll($tbl);
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to the Finest Selection of Blu-rays on the internets!</title>
<link href="admin/css/main.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body>
	<div class="header">
	<h1>Movie Review</h1>
<?php
	include('includes/nav.html');
?>
</div>
<div class="movies center">
<?php
	if(!is_string($getMovies)){
			while($row = mysqli_fetch_array($getMovies)){
				echo "<img src=\"images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
					<h2>{$row['movies_title']}</h2>
					<p>{$row['movies_year']}</p>
					<a href=\"details.php?id={$row['movies_id']}\">More Details...</a>
				<br><br>";
			}

	}else{
		echo "<p class=\"error\">{$getMovies}</p>";

	}
?>
</div>
<a href="admin/admin_addmovie.php" class="addMovie">Add Movie</a>
<?php
	include('includes/footer.html')
?>
</body>
</html>
