<?php

namespace App\Repository;

use App\Models\Actor;
use App\Models\Movie;
use App\Service\PDOService;
use PDO;

class MovieRepo
{
    private PDOService $PDOService;
    private string $queryAll = 'SELECT * FROM movie';

    public function __construct()
    {
        $this->PDOService = new PDOService();
    }


    public function findAll():array
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchAll();
    }

    public function findFirstMovieToModel():Movie
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchObject(Movie::class);
    }

    public function findAllMoviesToModel():array
    {
        return $this->PDOService->getPDO()->query($this->queryAll)->fetchAll(PDO::FETCH_CLASS, Movie::class);
    }

    public function findById(int $id):Movie|bool
    {
        $query = $this->PDOService->getPDO()->prepare('SELECT * FROM movie WHERE id = ?');
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetchObject(Movie::class);
    }

    public function findByTitle(string $title):array
    {
        $query = $this->PDOService->getPDO()->prepare('SELECT * FROM movie WHERE title LIKE :title');
        $title = '%'.$title.'%';
        $query->bindParam(':title',$title);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS,Movie::class);
    }

    public function insertMovie(Movie $movie): Movie
    {
        $query = $this->PDOService->getPDO()->prepare('INSERT INTO movie VALUE (null, :title, :release_date)');
        $title = $movie->getTitle();
        $releaseDate = $movie->getReleaseDate()->format('Y-m-d');
        $query->bindParam(':title',$title);
        $query->bindParam(':release_date',$releaseDate);
        $query->execute();

        return $movie;
    }

    public function addActorsToMovie(Movie $movie): Movie
    {
        $actors = $movie->getActors();
        foreach ($actors as $actor) {
            $query = $this->PDOService->getPDO()->prepare('INSERT INTO movie_actor VALUES (null,:id_actor,:id_movie)');

            $idMovie = $movie->getId();

            /** @var Actor $actor */
            $idActor = $actor->getId();

            $query->bindParam(':id_movie', $idMovie);
            $query->bindParam(':id_actor', $idActor);

            $query->execute();
        }
        return $movie;
    }

    public function deleteMovie(Movie $movie): Movie
    {
        $query = $this->PDOService->getPDO()->prepare('DELETE FROM movie WHERE id = :id');
        $id = $movie->getId();
        $query->bindParam(':id', $id);
        $query->execute();

        return $movie;
    }


}
