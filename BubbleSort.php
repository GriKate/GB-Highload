<?php

namespace App\Services;

class BubbleSort implements BubbleSortInterface
{

    public function sort(array $elements): array
    {
        //(array $data)
        $count_elements = count($elements);
        $iterations = $count_elements - 1;

        for ($i=0; $i < $count_elements; $i++) {
            $changes = false;
            for ($j=0; $j < $iterations; $j++) {
                if ($elements[$j] > $elements[($j + 1)]) {
                    $changes = true;
                    list($elements[$j], $elements[($j + 1)]) = array($elements[($j + 1)], $elements[$j]);
                }
            }
            $iterations--;
            if (!$changes) {
                return $elements;
            }
        }
        return $elements;
    }
}
