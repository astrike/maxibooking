<?php

namespace App\Http\Controllers;

use App\Service\Classes\ExchangeRatesMaker;

class CurrencyController extends Controller
{
    /**
     * Небольшое апи для ajax используемое
     * для передачи курса валют.
     *
     */
    public function getEuro() {
        $exFactory = new ExchangeRatesMaker();

        //создаем объект поставщика курса валют
        $exchangeRates = $exFactory->createExchangeRates();

        //пробуем получить курс евро
        $euro = $exchangeRates->getEuroRates();

        //если не удается получить у данного поставщика, переключаемся на следующего
        while ($euro === false || $euro === null) {
            $exchangeRates = $exFactory->nextExchangeRates();
            $euro = $exchangeRates->getEuroRates();
        }

        echo json_encode($euro);
    }
}
