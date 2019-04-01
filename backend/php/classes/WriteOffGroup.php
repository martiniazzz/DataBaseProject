<?php
/**
 * Created by PhpStorm.
 * User: Марта
 * Date: 26.03.2019
 * Time: 18:55
 */

class WriteOffGroup
{

    private $id;
    private $name;
    private $max;

    /**
     * WriteOffGroup constructor.
     * @param $id
     * @param $name
     * @param $max
     */
    public function __construct($id, $name, $max)
    {
        $this->id = $id;
        $this->name = $name;
        $this->max = $max;
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
    public function getMax()
    {
        return $this->max;
    }



}