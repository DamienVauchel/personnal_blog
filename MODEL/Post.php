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
    public function hydrate($datas)
    {
        $this->setTitle($datas["titre"]);
        $this->setId($datas["id"]);
        $this->setAuthor($datas["auteur"]);
        $this->setContent($datas["contenu"]);
        $this->setCreationDate($datas["date_creation"]);
        $this->setUpdateDate($datas["date_modif"]);
    }

    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getChapo()
    {
        return substr($this->content, 0, 200)."...";
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * @return mixed
     */
    public function getUpdateDate()
    {
        return $this->update_date;
    }


    // SETTERS
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param mixed $chapo
     */
    public function setChapo($chapo)
    {
        $this->chapo = $chapo;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @param mixed $creation_date
     */
    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;
    }

    /**
     * @param mixed $update_date
     */
    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;
    }
}