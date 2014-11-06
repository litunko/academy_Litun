<?php

/**
 * Created by PhpStorm.
 * User: Litun
 * Date: 28.10.2014
 * Time: 20:06
 */
class Teachers
{
    private $id;
    private $first_name;
    private $second_name;
    private $date;
    private $post_id;
    private $degree_id;
    private $topic;
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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getDegreeId()
    {
        return $this->degree_id;
    }

    /**
     * @param mixed $degree_id
     */
    public function setDegreeId($degree_id)
    {
        $this->degree_id = $degree_id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param mixed $first_name
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
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
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * @param mixed $post_id
     */
    public function setPostId($post_id)
    {
        $this->post_id = $post_id;
    }

    /**
     * @return mixed
     */
    public function getSecondName()
    {
        return $this->second_name;
    }

    /**
     * @param mixed $second_name
     */
    public function setSecondName($second_name)
    {
        $this->second_name = $second_name;
    }

    /**
     * @return mixed
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param mixed $topic
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
    }

}

?>