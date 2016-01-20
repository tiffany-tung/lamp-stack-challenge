<?php
date_default_timezone_set('UTC');
require_once 'connection.php';
require_once 'model/lamp-model.php';


$title = $_GET['title'];

//connect to mySQL
$conn = getConnection();
//search for movies with matching titles
$lampModel = new Lamp($conn);
$matches = $lampModel->queryMovies("%{$title}%", 'select * from movies where title like ?');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <link rel="icon" href="img/page-icon.png">
    <title>The Best Movies Ever</title>
    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body class="container">
    <?php 
    include 'views/search-form.php';
    include 'views/movie-table.php';
    ?>
    <p>Github Repo: <a href="https://github.com/tungt23/lamp-stack-challenge.git">https://github.com/tungt23/lamp-stack-challenge.git</a></p>
</body>
</html>