<?php

include_once __DIR__ . '/vendor/autoload.php'; 

use App\Service\PDOservice; 

$pdo = new PdoService; 

dump($pdo->findAllMovie()); 

dump(new PDOservice()); 