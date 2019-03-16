<?php
/**
 * Created by PhpStorm.
 * User: Марта
 * Date: 08.03.2019
 * Time: 15:08
 */

class MedicineGroup
{

    private $id;
    private $shelf;
    private $rack;
    private $productDate;
    private $dueTo;
    private $delPackAmount;
    private $storageUnitAmount;
    private $pricePerPack;
    private $totalPrice;
    private $isFinished;
    private $idMedicine;
    private $idDelivery;

    /**
     * MedicineGroup constructor.
     * @param $id
     * @param $shelf
     * @param $rack
     * @param $productDate
     * @param $dueTo
     * @param $delPackAmount
     * @param $storageUnitAmount
     * @param $pricePerPack
     * @param $totalPrice
     * @param $isFinished
     * @param $idMedicine
     * @param $idDelivery
     */
    public function __construct($id, $shelf, $rack, $productDate, $dueTo, $delPackAmount, $storageUnitAmount, $pricePerPack, $totalPrice, $isFinished, $idMedicine, $idDelivery)
    {
        $this->id = $id;
        $this->shelf = $shelf;
        $this->rack = $rack;
        $this->productDate = $productDate;
        $this->dueTo = $dueTo;
        $this->delPackAmount = $delPackAmount;
        $this->storageUnitAmount = $storageUnitAmount;
        $this->pricePerPack = $pricePerPack;
        $this->totalPrice = $totalPrice;
        $this->isFinished = $isFinished;
        $this->idMedicine = $idMedicine;
        $this->idDelivery = $idDelivery;
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
    public function getProductDate()
    {
        return $this->productDate;
    }

    /**
     * @return mixed
     */
    public function getDueTo()
    {
        return $this->dueTo;
    }

    /**
     * @return mixed
     */
    public function getDelPackAmount()
    {
        return $this->delPackAmount;
    }

    /**
     * @return mixed
     */
    public function getStorageUnitAmount()
    {
        return $this->storageUnitAmount;
    }

    /**
     * @return mixed
     */
    public function getPricePerPack()
    {
        return $this->pricePerPack;
    }

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->totalPrice;
    }

    /**
     * @return mixed
     */
    public function getisFinished()
    {
        return $this->isFinished;
    }

    /**
     * @return mixed
     */
    public function getIdMedicine()
    {
        return $this->idMedicine;
    }

    /**
     * @return mixed
     */
    public function getIdDelivery()
    {
        return $this->idDelivery;
    }

    public function toString(){
        $res = '';
        $res .= 'Номер групи: '.$this->id.'\n';
        $res .= 'Стелаж: '.$this->rack.'\n';
        $res .= 'Полиця: '.$this->shelf.'\n';
        $res .= 'Дата виготовлення: '.$this->productDate.'\n';
        $res .= 'Придатний до: '.$this->dueTo.'\n';
        $res .= 'Кількість: '.$this->storageUnitAmount.'\n';
        $st = $this->isFinished?'Закінчено':'Наявний'.'\n';
        $res .= 'Статус: '.$st.'\n';
        return $res;
    }

}