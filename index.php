<?php

include_once __DIR__ . '/vendor/autoload.php'; 

// use App\Repository\MovieRepo; 

use App\Service\PDOservice; 
use App\Repository\MovieRepo; 
use App\Models\Movie; 
use App\Models\Actor; 
use App\Repository\ActorRepo;


$movieRepo = new MovieRepo();
$actorRepo = new ActorRepo();


// $movie = $movieRepo->findById(13);

$actor1 = $actorRepo->findById(8);
$actor2 = $actorRepo->findById(9);
$actor3 = $actorRepo->findById(2);

$movie->addActor($actor1);
$movie->addActor($actor2);
$movie->addActor($actor3);

$movieRepo->addActorsToMovie($movie);

dump ($actor1); 
dump ($actor2);

$actorId = 11; 
$actor11 = new Actor($actorId);
$actorRepo->deleteActor($actor11);