<?php

include_once __DIR__ . '/vendor/autoload.php'; 

// use App\Repository\MovieRepo; 

use App\Service\PDOservice; 
use App\Repository\MovieRepo; 
use App\Models\Movie; 
use App\Models\Actor; 


$pdo = new MovieRepo(); 

// dump($pdo->findAllMovie()); 

// dump($pdo->findOneMovie()); 

// dump($pdo->findMovie());

dump($pdo->findById(10));

dump($pdo->findByName("h")); 


$movie = new Movie;
$movie->setTitle('Shrek 3');
$movie->setReleaseDate(new DateTime ('2003-1-23'));

dump($pdo->addMovie($movie)); 

$actor = new Actor;
$actor-> setFirstName('Omar'); 
$actor->setLastName('Sy'); 

dump($pdo->addActor($actor)); 