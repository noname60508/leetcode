<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class codility extends Controller
{
    function MaxCounters2($A = [3, 4, 4, 6, 1, 4, 4], $N = 5)
    {
        for ($i = 0; $i < $N; $i++) {
            $arr[$i] = 0;
        }
        foreach ($A as $value) {
            if ($value <= $N) {
                $arr[($value - 1)]++;
            } else {
                $max = max($arr);
                $arr = array_map(function ($num) use ($max) {
                    return $max;
                }, $arr);
            }
        }
        return $arr;
    }

    function MaxCounters($A = [3, 2, 3, 5, 6, 1, 2, 1, 2, 3, 6, 1], $N = 5)
    {
        // 取最後一個N+1
        $rev = array_reverse($A, true);
        $search = array_search(($N + 1), $rev);

        // 取N+1之前的最大數
        $mae = array_slice($A, 0, ($search + 1));
        $maeMax = array_count_values($mae);
        unset($maeMax[($N + 1)]);
        $max = max($maeMax);

        for ($i = 0; $i < $N; $i++) {
            $arr[$i] = $max;
        }
        $ushiro = array_slice($A, ($search + 1), (count($A) - $search + 2));
        // return $ushiro;
        foreach ($ushiro as $value) {
            $arr[($value - 1)]++;
        }
        return $arr;
    }
}
