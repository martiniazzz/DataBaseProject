<?php
/**
 * Created by PhpStorm.
 * User: Марта
 * Date: 07.03.2019
 * Time: 22:47
 */

class Delivery
{

    private $id;
    private $date;
    private $total;
    private $idprov;
    private $idman;
    private $groups;

    public function __construct($id, $date, $total, $idprov, $idman,$groups)
    {
        $this->id = $id;
        $this->date = $date;
        $this->total = $total;
        $this->idprov = $idprov;
        $this->idman = $idman;
        $this->groups = $groups;
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
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return mixed
     */
    public function getIdprov()
    {
        return $this->idprov;
    }

    /**
     * @return mixed
     */
    public function getIdman()
    {
        return $this->idman;
    }

    /**
     * @return mixed
     */
    public function getGroups()
    {
        return $this->groups;
    }


}