<?php
/**
 * Класс источника курса валют Europa.xml
 */

namespace App\Service\Classes;

class ExchangeRatesFromECB extends ExchangeRates
{
    /**
     * ExchangeRatesFromECB constructor.
     */
    public function __construct() {
        $this->path = 'http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
        $this->_setEuroRates();
    }

    /**
     * Получение курса валют.
     * @return mixed
     */
    protected function _setEuroRates() {
        if (($xml = file_get_contents($this->path)) !== false) {
            $parser = xml_parser_create();
            xml_parse_into_struct($parser, $xml, $array);
            xml_parser_free($parser);

            foreach ($array as $value) {
                if (isset($value['attributes']['CURRENCY']) && $value['attributes']['CURRENCY'] === 'RUB') {
                    $this->euro = $value['attributes']['RATE'];
                }
            }
        } else {
            $this->euro = false;
        }
    }
}