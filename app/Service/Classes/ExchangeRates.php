<?php
/**
 * Абстрактный класс источника курса валют
 */

namespace App\Service\Classes;

abstract class ExchangeRates
{
    /**
     * значение курса евро.
     */
    protected $euro;

    /**
     * Путь к файлу в сети(Url).
     */
    protected $path;

    /**
     * Возврат значения курса валюты Евро.
     * @return mixed
     */
    public function getEuroRates() {
        return $this->euro;
    }

    /**
     * Абстрактный класс получения значения курса Евро
     * из внешних источников.
     * @return mixed
     */
    abstract protected function _setEuroRates();
}