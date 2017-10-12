<?php
namespace App;
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
    protected $photo;

    // CONSTRUCT
    public function __construct($datas)
    {
        $this->hydrate($datas);
    }

    // HYDRATE
    public function hydrate($datas)
    {
        $this->setTitle($datas["title"]);
        $this->setId($datas["id"]);
        $this->setAuthor($datas["author"]);
        $this->setContent($datas["content"]);
        $this->setCreationDate($datas["creation_date"]);
        $this->setUpdateDate($datas["update_date"]);
        $this->setPhoto($datas["photo"]);
    }

    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getChapo()
    {
        return substr($this->content, 0, 200)."...";
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getCreationDate()
    {
        return $this->creation_date;
    }

    public function getUpdateDate()
    {
        return $this->update_date;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    // SETTERS
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setChapo($chapo)
    {
        $this->chapo = $chapo;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;
    }

    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    // METHODS
}