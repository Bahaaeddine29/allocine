<?php

namespace App\Models;


class Movie 
{
    private $title; 
    private $id;
    private $release_date; 

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getReleaseDate()
    {
        return $this->release_date;
    }

    public function setReleaseDate($release)
    {
        $this->release_date = $release;
    }

    public function getId ()
    {
        return $this->id;
    }


}

