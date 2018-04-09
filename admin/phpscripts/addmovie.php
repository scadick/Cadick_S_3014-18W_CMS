<?php
	function addMovie($title, $cover, $year, $runtime, $story, $trailer, $release, $genre) {
		include('connect.php');
		if($_FILES['cover']['type'] == "image/jpeg" || $_FILES['cover']['type'] == "image/jpg"){
			$target = "../images/{$cover['name']}";
			if(move_uploaded_file($_FILES['cover']['tmp_name'], $target)) {
				$orig = $target;
				$th_copy = "../images/TH_{$cover['name']}";
				if(!copy($orig, $th_copy)){
					echo "Failed to copy";
				}

				//$size = getimagesize($orig);
				//echo $size[1];
				$movieString = "INSERT INTO tbl_movies VALUES(NULL, '{$cover['name']}', '{$title}', '{$year}', '{$runtime}', '{$story}', '{$trailer}', '{$release}')";
				$movieQuery = mysqli_query($link, $movieString);
				if ($movieQuery) {
					$qstring = "SELECT * FROM tbl_movies ORDER BY movies_ID DESC LIMIT 1";
					$lastmovie = mysqli_query($link, $qstring);
					$row = mysqli_fetch_array($lastmovie);
					$lastID = $row['movies_id'];
					$genreString = "INSERT INTO tbl_mov_genre VALUES(NULL, {$lastID}, {$genre})";
					$genreQuery = mysqli_query($link, $genreString);
						redirect_to("admin_index.php");
					//echo $lastID;
				} else {
					$message = "Bugger!";
					return $message;
				}
			}
			
		}else{
			echo "Really, a GIF...";
		}
		mysqli_close($link);

	}
?>