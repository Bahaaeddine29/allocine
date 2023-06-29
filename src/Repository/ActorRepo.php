<?php

namespace App\Repository;

use App\Models\Actor;
use App\Service\PDOService;
use PDO;

class ActorRepo
{
    private PDOService $PDOService;
    private string $queryAll = 'SELECT * FROM actor';

    public function __construct()
    {
        $this->PDOService = new PDOService();
    }

    public function findAll():array
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchAll(PDO::FETCH_CLASS, Actor::class);
    }

    public function findById(int $id):Actor|bool
    {
        $query = $this->PDOService->getPDO()->prepare('SELECT * FROM actor WHERE id = ?');
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetchObject(Actor::class);
    }

    public function insertActor(Actor $actor): Actor
    {
        $query = $this->PDOService->getPDO()->prepare('INSERT INTO actor VALUE (null,:first_name,:last_name)');
        $firstName = $actor->getFirstName();
        $lastName = $actor->getLastName();
        $query->bindParam(':first_name', $firstName);
        $query->bindParam(':last_name', $lastName);
        $query->execute();
        return $actor;
    }

    public function deleteActor(Actor $actor): void
    {
        $query = $this->PDOService->getPDO()->prepare('DELETE FROM actor WHERE id = :id');
        $id = $actor->getId();
        $query->bindParam(':id', $id);
        $query->execute();
    }
}
