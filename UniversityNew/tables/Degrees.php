<?php

/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 28.10.2014
 * Time: 20:01
 */
class Degrees
{
    private $id;
    private $name;
    private $faculty_id;

    /**
     * @return mixed
     */
    public function getFacultyId()
    {
        return $this->faculty_id;
    }

    /**
     * @param mixed $faculty_id
     */
    public function setFacultyId($faculty_id)
    {
        $this->faculty_id = $faculty_id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}

?>