<!DOCTYPE html>
<html lang="en">
	<head>
		<title>File sharing</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	</head>

	<body>
		<div class="limiter">
			<div class="container-table100">
				<?php
					$configs       = include('config.php');
					$target_dir    = $configs['FILE_LOCATION'];
					$target_file   = $target_dir . basename($_FILES["fileToUpload"]["name"]);
					$uploadOk      = 1;
					$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

					// Check if file already exists
					if (file_exists($target_file)) {
					    echo "<p>Sorry, file already exists.</p>";
					    echo "<br/>";
					    echo "<a href='/' class='btn btn-primary'>Return Home</a>";
					    $uploadOk = 0;
					}

					// Check if $uploadOk is set to 0 by an error
					if ($uploadOk == 0) {
					    echo "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
					} else {
					    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					        header("Location: http://simplefileserver.test/");
					    } else {
					        echo "<br><p>Sorry, there was an error uploading your file.</p>";
					    }
					}
				?>
			</div>
		</div>
	</body>
	
</html>