<?php include("includes/config.php"); // Include the config.php file
 ?>

<!-- The header of the website -->
<!DOCTYPE html>
<html lang="sv">
<head>
    <title><?= $page_title; ?></title> <!-- Set the title of the page -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> <!--For older versions of Internet Explorer -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Set the meta tags -->
    <script defer src="js/script.js"></script> <!-- Include the script.js file -->
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script> <!-- Include the plotly library -->
    <link rel="stylesheet" href="css/style.css" type="text/css"> <!-- Include the style.css file -->
    <link rel="stylesheet" href="css/stats.css" type="text/css"> <!-- Include the style.css file -->

</head>

<body>
 <div id="mainheader">
    <header>
        <h1>Equal Engineering</h1>
        <?php include("includes/mainmenu.php"); ?> <!-- Include the mainmenu.php file -->
    </header>
</div>