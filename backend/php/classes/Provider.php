<?php
/**
 * Created by PhpStorm.
 * User: Марта
 * Date: 07.03.2019
 * Time: 22:18
 */

class Provider
{

    private $id;
    private $name;
    private $country;
    private $city;
    private $street;
    private $buildNo;
    private $account;
    private $email;
    private $phones;

    public function __construct($id,$name,$country,$city,$street,$buildNo,$account,$email,$phones){
        $this->id = $id;
        $this->name = $name;
        $this->country = $country;
        $this->city = $city;
        $this->street = $street;
        $this->buildNo = $buildNo;
        $this->account = $account;
        $this->email = $email;
        $this->phones = $phones;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @return mixed
     */
    public function getBuildNo()
    {
        return $this->buildNo;
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getPhones()
    {
        return $this->phones;
    }

    public function toString()
    {
        return $this->name."  ".$this->country."  ".$this->city."  ". $this->street."  ".$this->buildNo."  ". $this->account."  ". $this->email;
    }


}