<?php
/**
 * Created by PhpStorm.
 * User: Марта
 * Date: 23.03.2019
 * Time: 16:13
 */

class GivenMed
{

    private $name;
    private $amount;

    /**
     * GivenMed constructor.
     * @param $name
     * @param $amount
     */
    public function __construct($name, $amount)
    {
        $this->name = $name;
        $this->amount = $amount;
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
    public function getAmount()
    {
        return $this->amount;
    }


}