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

        $exchangeRates = $exFactory->createExchangeRates();

        $euro = $exchangeRates->getEuroRates();

        while ($euro === false || $euro === null) {
            $exchangeRates = $exFactory->nextExchangeRates();
            $euro = $exchangeRates->getEuroRates();
        }

        echo json_encode($euro);
    }
}
