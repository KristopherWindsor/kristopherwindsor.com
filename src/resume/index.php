<!DOCTYPE html>
<html>
  <head>
    <title>Kristopher's Resumé</title>
    <link href="style.css" rel="stylesheet" type="text/css" title="Classic">
    <link rel="shortcut icon" href="/favicon.png">

    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="description" content="Kristopher Windsor's resumé">
    <meta name="keywords" content="kristopher windsor, kristopherwindsor, php, full-stack developer, backend developer, front-end developer, php developer">
  </head>
  <body>
    <img src="linkedin-banner.png" alt="">
    <div id="box">
      <?php
      require_once __DIR__ . '/vendor/Parsedown.php';
      $markdown = file_get_contents( __DIR__ . '/source/resume.markdown' );
      $parsedown = new Parsedown();
      echo $parsedown->text($markdown);
      ?>
    </div>

    <div id="download">
      <a href="source/kristopher.pdf">View PDF</a> |
      <a href="source/resume.markdown">Plain text</a>
    </div>
  </body>
</html>
