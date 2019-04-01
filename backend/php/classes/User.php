<?php
/**
 * Created by PhpStorm.
 * User: Марта
 * Date: 26.03.2019
 * Time: 17:10
 */

class User
{

    private $id;
    private $lastName;
    private $firstName;
    private $midName;
    private $dep;

    /**
     * User constructor.
     * @param $id
     * @param $lastName
     * @param $firstName
     * @param $midName
     * @param $dep
     */
    public function __construct($id, $lastName, $firstName, $midName, $dep)
    {
        $this->id = $id;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->midName = $midName;
        $this->dep = $dep;
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
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @return mixed
     */
    public function getMidName()
    {
        return $this->midName;
    }

    /**
     * @return mixed
     */
    public function getDep()
    {
        return $this->dep;
    }

    public function toString(){
        return $this->lastName." ".$this->firstName." ".$this->midName;
    }


}