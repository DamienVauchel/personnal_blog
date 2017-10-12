<?php
namespace App;
class Category
{
    // ATTRIBUTES
    protected $id;
    protected $name;

    // CONSTRUCT
    public function __construct($datas)
    {
        $this->hydrate($datas);
    }

    // HYDRATE
    public function hydrate($datas)
    {
        $this->setName($datas["name"]);
        $this->setId($datas["id"]);
    }

    // GETTERS
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    // SETTERS
    public function setName($name)
    {
        $this->name = $name;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // METHODS
    public function find($id)
    {

    }
}