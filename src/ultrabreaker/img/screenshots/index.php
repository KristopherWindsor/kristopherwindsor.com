<html>
	<head>
		<title>Pictures</title>
	</head>
	<body>
		<div style="border: 1px solid black; margin: 20px auto; padding: 0 32px; text-align: center; width: 800px;">
			<h1>Pictures!</h1>
<?php

// quick JPG showing utility by Kristopher Windsor

function showdirectory ($theDirectory)
	{
	if(is_dir($theDirectory))
		{
		$dir = opendir($theDirectory);
		while(false !== ($file = readdir($dir)))
			{
			if ($file[strlen($file) - 1] != "." && substr($file, strlen($file) - 4, 4) == '.jpg')
				{
			       	$type = filetype($theDirectory . '/' . $file);
				echo "<img width=\"640px\" src=\"$theDirectory/$file\"><br>";
				echo '<h2 style="text-transform: capitalize">';
				echo str_replace('_', ' ', str_replace('-', ' ', substr($file, 0, strlen($file) - 4)));
				echo "</h2><br>\n";
				}
	    		}
		closedir($dir);
		}
	}
showdirectory('.');
?>

		</div>
	</body>
</html>
