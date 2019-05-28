<?php
/**
 * Класс создателя объектов Поставщиков курса валют.
 */

namespace App\Service\Classes;

class ExchangeRatesMaker
{
    /**
     * Список классов источиков курса валют.
     */
    private $exClasses;

    /**
     * Объект источника курса валют.
     */
    private $exInstance;

    /**
     * Текущий номер источника курса валют.
     */
    private $currentlyClassNumber;

    /**
     * ExchangeRatesMaker constructor.
     */
    public function __construct() {
        $this->exClasses = config('exchangeRates'); //получение списка классов источников валют
        $this->currentlyClassNumber = 0; //номер текущего источника

    }

    /**
     * Создание объекта текущего источника курса валюты.
     * @return mixed
     */
    public function createExchangeRates() {
        if (!isset($this->exInstance)) {
            $this->exInstance = new $this->exClasses[$this->currentlyClassNumber];
            return $this->exInstance;
        }
        return $this->exInstance;
    }

    /**
     * Создание следующего истоника курса валюты.
     * @return mixed
     */
    public function nextExchangeRates() {
        //увеличиваем номер текущего источника курсов на 1. Если достигнут предел, начинаем с начала.
        if (count($this->exClasses) < ($this->currentlyClassNumber + 1)){
            $this->currentlyClassNumber++;
        } else {
            $this->currentlyClassNumber = 0;
        }

        $this->exInstance = new $this->exClasses[$this->currentlyClassNumber];
        return $this->exInstance;
    }
}