<?php
	$configs       = include('config.php');
	$file_location = $configs['FILE_LOCATION'];
	$files         = [];
	$directories   = [];

	if ($handle = opendir($file_location)) 
	{
	    while (false !== ($entry = readdir($handle))) 
	    {
	    	$directory = is_dir($file_location.$entry);

	        if (!$directory && $entry != "." && $entry != "..") 
	        {
	      		$files[] = $entry;
	        }
	    }
	    closedir($handle);
	}
?>

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
	<form action="upload.php" method="post" enctype="multipart/form-data">
	  <div class="form-row">
	    <div class="col">
	      <input type="file" class="form-control" name="fileToUpload" id="fileToUpload">
	    </div>
	    <div class="col-1">
			<button type="submit" class="btn btn-primary" value="Upload File" name="submit">Upload file</button>
	    </div>
	  </div>
	</form>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table">

					<div class="row header">
						<div class="cell" style='width: 20% !important'>
							No.
						</div>
						<div class="cell" style='width: 70% !important'>
							Filename
						</div>
						<div class="cell">
							Action 
						</div>
					</div>

					<?php
						sort($files);
						foreach ($files as $key => $file_name)
						{
							$key++;
							echo "<div class='row'>";
								echo 	"<div class='cell' data-title='No' style='width: 0px !important'>".$key."</div>";
								echo 	"<div class='cell' data-title='Full Name'>".$file_name."</div>";
								echo 	"<div class='cell' data-title='Location'>
											<a data-toggle='Download' title='Download!' class='btn-download' href='download.php?file=".$file_location.$file_name."'>
												<i class='fa fa-download'></i>
											</a>
											<a data-toggle='Copy' title='Copy!'  href='javascript:;' data-url='download.php?file=".$file_location.$file_name."'>
												<i class='fa fa-copy i-btn'></i>
											</a>
											<a data-toggle='delete' title='delete!' class='btn-delete' href='delete.php?file=".$file_location.$file_name."'>
												<i class='fa fa-trash'></i>
											</a>
										</div>";
							echo "</div>";
						}
					?>
				</div>
			</div>
		</div>
	</div>


<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>