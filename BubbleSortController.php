<?php

namespace App\Http\Controllers;

use App\Services\BubbleSortInterface;
use Illuminate\Routing\Controller as BaseController;
use Psr\Log\LoggerInterface;

class BubbleSortController extends BaseController
{
    public function __construct(
        private LoggerInterface $logger,
        private BubbleSortInterface $bubbleSort
    ) {}

    public function list() {
        try {
            $inputArray = [3, 10, 0, 2, 5, 11, 1, 4, 9, 6, 8, 7];

            $timeStart = time();
            $this->bubbleSort->sort($inputArray);
            $timeEnd = time();

            $memoryUsage = memory_get_usage();
            //debug - режим профилирования
            $this->logger->debug($timeEnd - $timeStart);
            $this->logger->debug(memory_get_usage());
        } catch (\Throwable $exception)
        {
            $this->logger->error('Здесь были ошибки: ' . $exception->getMessage());
        }
//        $this->req();
    }

//    private function req() {
//        echo 1;
//        req();
//    }
}
