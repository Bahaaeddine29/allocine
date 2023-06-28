<?php

include_once __DIR__ . '/vendor/autoload.php'; 

// use App\Repository\MovieRepo; 

use App\Service\PDOservice; 
use App\Repository\MovieRepo; 


$pdo = new MovieRepo(); 

// dump($pdo->findAllMovie()); 

// dump($pdo->findOneMovie()); 

// dump($pdo->findMovie());

dump($pdo->findById(10));
dump($pdo->findByName("h")); 
