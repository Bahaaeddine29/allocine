<?php 

namespace App\Service; 

use PDO; 

class PDOservice 
{
    protected PDO $pdo;

    public function __construct ()
    {
        $this->pdo = new PDO($this->dsn, $this->user, $this->pwd);
    }

    private string $dsn = 'mysql:host=127.0.0.1:3306;dbname=allocine';
    private string $user = 'root';
    private string $pwd = ''; 


    public function findAllMovie(): array
    {
        return $this->pdo->query('SELECT * FROM movie')->fetchAll();
          
    }

}

