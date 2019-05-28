<?php
/**
 * Класс источника курса валют Dayly.json
 */

namespace App\Service\Classes;

class ExchangeRatesFromDailyJson extends ExchangeRates
{
    /**
     * ExchangeRatesFromDailyJson constructor.
     */
    public function __construct() {
        $this->path = 'https://www.cbr-xml-daily.ru/daily_json.js';
        $this->_setEuroRates();
    }

    /**
     * Получение курса валют.
     * @return mixed
     */
    protected function _setEuroRates() {
        if (($json = file_get_contents($this->path)) !== false){
            $array = json_decode($json);
            $this->euro = $array->Valute->EUR->Value;
        } else {
            $this->euro = false;
        }

    }
}