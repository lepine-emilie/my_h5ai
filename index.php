<?php
include "main.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" integrity="sha256-zmfNZmXoNWBMemUOo1XUGFfc0ihGGLYdgtJS3KCr/l0=" crossorigin="anonymous" />
    <link rel="stylesheet" href="/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="/h5ai.js"></script>
    <title>MY H5AI</title>
</head>
<body>
<div class="container">
    <div class="row">
        <h1>H5AI</h1>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php breadcrumb("./".$_SERVER["PATH_INFO"]); ?>
    </div></div>
<div class="container">
    <div class="row">
        <button class="myButton" onclick="goBack()"><i class="fas fa-arrow-left" ></i></button>
        <button class="myButton" onclick="goForward()"><i class="fas fa-arrow-right"></i></button>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h3>Directory</h3>
            <ul>
                <li><a href="/"><i class="fas fa-folder"></i> ROOT</a></li>
                <?php main_directory($_SERVER["DOCUMENT_ROOT"]);?>
            </ul>
        </div>
        <div class="col-md-7">
            <h3>Index</h3>
            <?php main_whole_directory("./".$_SERVER["PATH_INFO"], $_GET["sort"]??"asc"); ?>
        </div>
    </div>
</div>
</body>
</html>