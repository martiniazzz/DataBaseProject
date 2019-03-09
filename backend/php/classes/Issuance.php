<?php

class Issuance
{

    private $id;
    private $date;
    private $status;
    private $manager;
    private $respPerson;

    private $given_med;

    public function __construct($id,$date,$status,$manager,$respPerson,$given_med)
    {
        $this->id = $id;
        $this->date = $date;
        $this->status = $status;
        $this->manager = $manager;
        $this->respPerson = $respPerson;
        $this->given_med = $given_med;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @return mixed
     */
    public function getRespPerson()
    {
        return $this->respPerson;
    }

    /**
     * @return mixed
     */
    public function getGivenMed()
    {
        return $this->given_med;
    }

}