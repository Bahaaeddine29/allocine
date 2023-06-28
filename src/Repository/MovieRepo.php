<?php 

namespace App\Repository; 

use App\Models\Movie;
use App\Models\Actor; 
use App\Service\PDOService;
use PDO;

/**
 * Summary of MovieRepository
 */
class MovieRepo
{
  private PDOService $pdoService;
  private string $queryAll = 'SELECT * FROM movie';
  
  public function __construct()
  {
    $this->pdoService = new PDOService();
  }

  /**
   * Summary of findAllMovie
   * @return array
   */
  public function findAllMovie():array
  {
    return $this->pdoService->getPdo()->query($this->queryAll)->fetchAll();
  }

  /**
   * Summary of findOneMovie
   * @return \App\Models\Movie
   */
  public function findOneMovie():Movie
  {
    return $this->pdoService->getPdo()->query($this->queryAll)->fetchObject(movie::class);
  } 

  /**
   * Summary of findMovie
   * @return array
   */
  public function findMovie():array
  {
    return $this->pdoService->getPdo()->query($this->queryAll)->fetchAll(PDO::FETCH_CLASS, movie::class);
  } 

    public function findById(int $id):Movie | bool
  {
    $query = $this->pdoService->getPdo()->prepare('SELECT * FROM movie WHERE id= ?');
    $query->bindValue(1, $id);
    $query->execute();
    return $query->fetchObject(Movie::class);
  }

  public function findByName (string $title)
    {
        $query = $this->pdoService->getPdo()->prepare("SELECT*FROM movie WHERE title LIKE :title");
        $like = '%' . $title . '%';
        $query-> bindParam(':title', $like);
        $query-> execute();
        return $query->FetchAll(PDO::FETCH_CLASS, movie::class);
    }

    public function addMovie(Movie $movie):movie 
    {
        $query = $this->pdoService->getPDO()->prepare('INSERT INTO movie VALUE (null, :title, :release_date)');
        $title = $movie->getTitle();
        $date = $movie->getReleaseDate();
        $releaseDate = $date->format('Y-m-d');
        $query->bindParam(':title', $title);
        $query->bindParam(':release_date', $releaseDate);
        $query->execute();
        
        return $movie;
    }

    public function addActor(Actor $actor)
    {
        $query = $this->pdoService->getPDO()->prepare('INSERT INTO actor VALUE (null, :first_name, :last_name)');
        $firstName = $actor->getFirstName();
        $lastName = $actor->getLastName();
        $query->bindParam(':first_name', $firstName);
        $query->bindParam(':last_name', $lastName);
        $query->execute();
        
        return $actor;
    }

}


