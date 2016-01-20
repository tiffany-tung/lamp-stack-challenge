<?php 
    require_once 'model/lamp-model.php';
    require_once 'connection.php';
    $primaryKey = $_GET['primaryKey'];
    
    $conn = getConnection();
    
    //find information on given movie
    $lampModel = new Lamp($conn);
    $movie = $lampModel->queryMovies($primaryKey, 'select * from movies where primary_key=?');
    
    $title = $movie[0]['title'];
    $released = $movie[0]['released'];
    $distributor = $movie[0]['distributor'];
    $genre = $movie[0]['genre'];
    $rating = $movie[0]['rating'];
    $gross = $movie[0]['gross'];
    $tickets = $movie[0]['tickets'];
    $imdb_id = $movie[0]['imdb_id']; 
    $url = "http://www.omdbapi.com/?i=$imdb_id&tomatoes=true";
    $json = file_get_contents($url);
    $movieData = json_decode($json);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <link rel="icon" href="img/page-icon.png">
    <title><?=$title ?></title>
    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center"><?=$title ?></h1>
    <h2 class="text-center">Ratings <?=htmlentities($movieData->tomatoRating) ?> / 10</h2>
    <h3 class="text-center"><?=$distributor ?></h3>
    <ul class="text-center list-unstyled">
        <li>Released on <?=$released ?></li>
        <li><?=$genre ?></li>
        <li>Rated <?=$rating ?></li>
        <li>Gross Revenue $<?=number_format($gross) ?></li>
        <li>Number of Tickets Sold <?=number_format($tickets) ?></li>
    </ul>
</body>
</html>