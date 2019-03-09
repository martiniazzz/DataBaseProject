<?php

class WriteOff
{

    private $id;
    private $date;
    private $amount;
    private $reason;
    private $shelf;
    private $rack;
    private $idGroup;
    private $idManager;

    /**
     * WriteOff constructor.
     * @param $id
     * @param $date
     * @param $amount
     * @param $reason
     * @param $shelf
     * @param $rack
     * @param $idGroup
     * @param $idManager
     */
    public function __construct($id, $date, $amount, $reason, $shelf, $rack, $idGroup, $idManager)
    {
        $this->id = $id;
        $this->date = $date;
        $this->amount = $amount;
        $this->reason = $reason;
        $this->shelf = $shelf;
        $this->rack = $rack;
        $this->idGroup = $idGroup;
        $this->idManager = $idManager;
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
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return mixed
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * @return mixed
     */
    public function getShelf()
    {
        return $this->shelf;
    }

    /**
     * @return mixed
     */
    public function getRack()
    {
        return $this->rack;
    }

    /**
     * @return mixed
     */
    public function getIdGroup()
    {
        return $this->idGroup;
    }

    /**
     * @return mixed
     */
    public function getIdManager()
    {
        return $this->idManager;
    }

    public function toString(){
        return $this->id."   ".$this->date."  ".$this->amount."  ".$this->idGroup;
    }

}