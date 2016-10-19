<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>
<head>
	<title>Ultrabreaker: the next level of brick-breaking action!</title>

	<link href="style.css" rel="stylesheet" type="text/css">
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="description" content="Ultrabreaker is the newest and most feature-packed breakout game ever!">
	<meta name="keywords" content="ultrabreaker, kristopherwindsor, breakout, games, freebasic">

	<script type="text/javascript">

		var screenshot_total = 4, screenshot_current = 0;
		var screengrid_x = 0, screengrid_y = 0, screengrid_tx = 0, screengrid_ty = 0;
		var autoslide = 0, started = false;

		function start ()
			{
			// start animation service and show or hide the download section

			setInterval("slideshow_step()", 18);
			<?php if (isset($_GET['downloadnow'])) echo 'showdownload()'; else echo 'hidedownload()'; ?>;
			}

		function showdownload ()
			{
			// show the download section

			started = false;
			document.getElementById('getgame').style.display = 'block';
			}

		function hidedownload ()
			{
			// start slideshow over, then hide download section

			slideshow_reset();
			document.getElementById('getgame').style.display = 'none';
			}

		function slideshow_reset ()
			{
			// reset slideshow (start over)

			var screengrid = document.getElementById('screengrid');

			if (autoslide != 0)
				clearTimeout(autoslide);
			autoslide = setInterval("slideshow_next()", 8000);

			screenshot_current = 0;
			screengrid_x = 0;
			screengrid_y = 0;
			screengrid_tx = 0;
			screengrid_ty = 0;
			screengrid.style.left = "0px";
			screengrid.style.top = "0px";

			started = true;
			}

		function slideshow_next ()
			{
			// target next screenshot

			screenshot_current ++;
			if (screenshot_current >= screenshot_total)
				screenshot_current = 0;

			switch (screenshot_current)
				{
				case 0: screengrid_tx = 0; screengrid_ty = 0; break;
				case 1: screengrid_tx = 0; screengrid_ty = 480; break;
				case 2: screengrid_tx = 640; screengrid_ty = 480; break;
				case 3: screengrid_tx = 640; screengrid_ty = 0; break;
				}
			}

		function slideshow_manual ()
			{
			// user clicked to go to the next screenshot, so reset the delay for auto slideshow

			if (!started)
				return;

			clearTimeout(autoslide);
			autoslide = setInterval("slideshow_next()", 8000);

			slideshow_next();
			}

		function slideshow_step ()
			{
			// slide toward next screenshot

			if (!started)
				return;
			if (screengrid_x == screengrid_tx && screengrid_y == screengrid_ty)
				return;

			var screengrid = document.getElementById('screengrid');

			if (abs(screengrid_x - screengrid_tx) < .3)
				screengrid_x = screengrid_tx;
			else
				screengrid_x += (screengrid_tx - screengrid_x) / 10;

			if (abs(screengrid_y - screengrid_ty) < .3)
				screengrid_y = screengrid_ty;
			else
				screengrid_y += (screengrid_ty - screengrid_y) / 10;

			screengrid.style.left = -parseInt(screengrid_x) + "px";
			screengrid.style.top = -parseInt(screengrid_y) + "px";
			}

		function abs (x)
			{
			if (x < 0)
				return -x;
			return x;
			}

	</script>
</head>

<body onLoad="start()">
	<div class="box">
		<img class="boxbackground" src="img/box-background.png" alt="">

		<div class="boxcontent">
			<div class="links">
				<ul>
					<li><a href="http://www.facebook.com/pages/UltraBreaker/27216499420">Facebook</a></li>
					<li><a href="https://www.youtube.com/playlist?list=PL7laMXmAt6m0cJqyVGcWct7chMrpp6KS9">YouTube</a></li>
					<li><a href="https://github.com/KristopherWindsor/ultrabreaker">GitHub</a></li>
				</ul>
			</div>

			<div class="screenshot">
				<!-- screengrid holds all the screenshots and moves around in screenshot; screenshot hides overflow -->
				<div class="screengrid" id="screengrid">

					<?php

					$nums = array();
					while (count($nums) < 4)
						{
						$nums[count($nums)] = (rand() % 70) + 1;
						for ($i = 0; $i < count($nums) - 1; $i ++)
							if ($nums[$i] == $nums[count($nums) - 1])
								unset($nums[count($nums) - 1]);
						}

					$pre = "\n\t\t\t\t\t<img src=\"img/screenshots/";

					echo $pre . $nums[0] . '.jpg" alt="" style="top: 0; left: 0;">';
					echo $pre . $nums[1] . '.jpg" alt="" style="bottom: 0; left: 0;">';
					echo $pre . $nums[2] . '.jpg" alt="" style="bottom: 0; right: 0;">';
					echo $pre . $nums[3] . '.jpg" alt="" style="top: 0; right: 0;">';

					?>

				</div>
			</div>

			<a class="downloadlink" href="index.php?downloadnow" onClick="showdownload(); return false">
				<img src="img/download-show.png" alt="Download now!">
			</a>

			<div class="getgame" id="getgame">
				<img class="getgamebackground" src="img/download-background.jpg" alt="">

				<div class="getgamecontent">
					<p>
						Ultrabreaker, the newest breakout game, takes brick-breaking to the next level, with more bricks, more speed, and more action.
						It introduces features such as gravity, aliens, and a secret weapon, and comes with 70 levels and a full-featured level editor.
						Ultrabreaker runs on Windows.
					</p>

					<a href="ultrabreaker-setup.exe">
						<img src="img/download-now.png" alt="Download now!">
					</a>
				</div>

				<a class="downloadlink" href="index.php" onClick="hidedownload(); return false">
					<img src="img/download-back.png" alt="Back...">
				</a>
			</div>

			<a class="logo" href="index.php" onClick="slideshow_manual(); return false">
				<img src="img/logo.png" alt="">
			</a>
		</div>
	</div>
</body>
</html>
