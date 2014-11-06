<?php

/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 28.10.2014
 * Time: 20:03
 */
class Groups
{
    private $id;
    private $name;
    private $number_students;
    private $name_leader;

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

    /**
     * @return mixed
     */
    public function getNameLeader()
    {
        return $this->name_leader;
    }

    /**
     * @param mixed $name_leader
     */
    public function setNameLeader($name_leader)
    {
        $this->name_leader = $name_leader;
    }

    /**
     * @return mixed
     */
    public function getNumberStudents()
    {
        return $this->number_students;
    }

    /**
     * @param mixed $number_students
     */
    public function setNumberStudents($number_students)
    {
        $this->number_students = $number_students;
    }
}

?>