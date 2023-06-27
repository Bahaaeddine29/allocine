<?php 

namespace App\Service; 

use PDO;

use App\Models\Movie; 

class PDOservice 
{
    protected PDO $pdo;

    private string $dsn = 'mysql:host=127.0.0.1:3306;dbname=allocine';
    private string $user = 'root';
    private string $pwd = ''; 

    public function __construct ()
    {
        $this->pdo = new PDO($this->dsn, $this->user, $this->pwd);
    }


            public function getPdo(): PDO
            {
                return $this->pdo;
            }


        public function getDsn():string
        {
            return $this->dsn;
        }
        
        public function getUser():string
        {
            return $this->user;
        }

        public function getPwd():string
        {
            return $this->pwd;
        }
            

}

