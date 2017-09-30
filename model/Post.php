<?php
class Post
{
    // ATTRIBUTES
    protected $id;
    protected $title;
    protected $chapo;
    protected $content;
    protected $author;
    protected $creation_date;
    protected $update_date;

    // CONSTRUCT
    public function __construct($datas)
    {
        $this->hydrate($datas);
    }

    // HYDRATE
    public function hydrate()
    {

    }

    // GETTERS
    public function id()
    {
        return $this->$id;
    }

    public function title()
    {
        return $this->$title;
    }

    public function chapo()
    {
        return $this->$chapo;
    }

    public function content()
    {
        return $this->$content;
    }

    public function author()
    {
        return $this->$author;
    }

    public function creationDate()
    {
        return $this->$creation_date;
    }

    public function updateDate()
    {
        return $this->$update_date;
    }

    // SETTERS
    public function setAuthor()
    {
        
    }
}