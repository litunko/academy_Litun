<?php

/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 28.10.2014
 * Time: 19:58
 */
class Courses
{
    private $id;
    private $name;
    private $semester;
    private $final_control;
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
    public function getFinalControl()
    {
        return $this->final_control;
    }

    /**
     * @param mixed $final_control
     */
    public function setFinalControl($final_control)
    {
        $this->final_control = $final_control;
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

    /**
     * @return mixed
     */
    public function getSemester()
    {
        return $this->semester;
    }

    /**
     * @param mixed $semester
     */
    public function setSemester($semester)
    {
        $this->semester = $semester;
    }

}

?>