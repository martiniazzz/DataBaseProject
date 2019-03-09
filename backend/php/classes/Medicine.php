<?php

class Medicine
{

    private $id;
    private $name;
    private $producer;
    private $desc;
    private $unitType;
    private $unitAmount;
    private $temp;
    private $usabilityTerm;
    private $storageAmount;

    public function __construct($id,$name,$producer,$desc,$unitType,$unitAmount,$temp,$usabilityTerm,$storageAmount)
    {
        $this->id = $id;
        $this->name = $name;
        $this->producer = $producer;
        $this->desc = $desc;
        $this->unitType = $unitType;
        $this->unitAmount = $unitAmount;
        $this->temp = $temp;
        $this->usabilityTerm = $usabilityTerm;
        $this->storageAmount = $storageAmount;
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
    public function getProducer()
    {
        return $this->producer;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @return mixed
     */
    public function getUnitType()
    {
        return $this->unitType;
    }

    /**
     * @return mixed
     */
    public function getUnitAmount()
    {
        return $this->unitAmount;
    }

    /**
     * @return mixed
     */
    public function getTemp()
    {
        return $this->temp;
    }

    /**
     * @return mixed
     */
    public function getUsabilityTerm()
    {
        return $this->usabilityTerm;
    }

    public function getStorageAmount()
    {
        return $this->storageAmount;
    }

}