<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class interview extends Controller
{
    public function test()
    {
        return 'interview controller';
    }
    public function kkday1($S = 'BILLOBILLOLLOBBI', $L = ["BILL", "BOB"])
    {
        $arrS = str_split($S);
        $countS = array_count_values($arrS); // 計算每個字母有多少個
        $ans = 0;
        foreach ($L as $val) {
            // 算出需要的字母數量
            $countL = array_count_values(str_split($val));
            $min = null;
            foreach ($countL as $wood => $sum) {
                // 如果S內有需要的英文字母
                if (!empty($countS[$wood])) {
                    // 取商數
                    $quotient = $countS[$wood] / $sum;
                    if (empty($min)) {
                        $min = $quotient;
                    }
                    // 找出最小的數
                    if ($min > $quotient) {
                        $min = $quotient;
                    }
                } else {
                    // 如果S內沒有需要的英文字就無法拼出歸0換下一組
                    $min = 0;
                    continue;
                }
            }
            if ($ans < $min)
                $ans = $min;
        }
        return $ans;
    }
    public function kkday2(&$A = [1, 2, 3, 5, 9, 9], $X = 3)
    {
        $N = sizeof($A);
        if ($N == 0) {
            return -1;
        }
        $l = 0;
        $r = $N - 1;
        while ($l < $r) {
            $m = (($l + $r) / 2);
            if ($A[$m] > $X) {
                $r = $m - 1;
            } else {
                $l = $m;
            }
        }
        if ($A[$l] == $X) {
            return (int) $l;
        } else return -1;
    }
    public function kkday3($S = "0081")
    {
        $count = 0;
        for ($i = 0; $i < strlen($S); $i++) {
            $copyS = $S;
            for ($j = 0; $j <= 9; $j++) {
                $copyS[$i] = $j;
                // 排除掉自身可以被整除，避免重複
                if ($copyS != $S && $copyS % 3 == 0) {
                    $count++;
                }
            }
        }
        // 如果自身能被整除在加回去
        if ($S % 3 == 0)
            $count++;
        return $count;
    }

    public function kkday4($S = "0081")
    {
        $countArr = [];
        for ($i = 0; $i < strlen($S); $i++) {
            $copyS = $S;
            for ($j = 0; $j <= 9; $j++) {
                $copyS[$i] = $j;
                // 如果有比對過就跳下一個
                if (isset($countArr[$copyS])) {
                    continue;
                }
                if ($copyS % 3 == 0) {
                    $countArr[$copyS] = 1;
                } else {
                    $countArr[$copyS] = 0;
                }
            }
        }
        return array_sum($countArr);
    }

    /**
     * 何も書いていない紙に、以下の規則に従って文字を書いていきます。
     * 1 から 100 までの整数 N について順に以下の手順を行う。
     *
     * N を 3 で割った余りを求める。
     * その余りの値を表す英単語(0 なら ZERO、1 なら ONE、2 なら TWO)を N 回紙に(空白を空けずに)書き込む。
     * 最終的に紙に書き込まれた文字列(16833 文字)の冒頭の部分は以下のようになります。
     *
     * ONETWOTWOZEROZEROZEROONEONEONEONETWO...
     *
     * この文字列を 1 行 1000 文字の行に分けて書き直したとします。
     *
     * ONETWOTWOZEROZEROZER...EROZERO
     *
     * ZEROZEROONEONEONEONE...WOTWOTW
     *
     * OTWO...
     *
     * このときに、各行の左から 300 文字目の文字(左端を 1 文字目と数える)の文字を上から下の順に読んでできる文字列を答えてください。
     *  */
    public function teamLab1()
    {
        $words = ['ZERO', 'ONE', 'TWO',];
        $result = '';

        // 生成初始的 16833 個字符的字串
        for ($i = 1; $i <= 100; $i++) {
            $remainder = $i % 3;
            $word = $words[$remainder];
            $result .= str_repeat($word, $i);
        }
        // return $result;

        // 將結果分成每行 1000 個字符
        $lines = str_split($result, 1000);
        // return $lines;

        // 從每行的第 300 個字符中取出結果
        $final_result = '';
        foreach ($lines as $line) {
            $final_result .= $line[299]; // 由於 PHP 的索引從 0 開始，所以是 299
        }

        // 輸出最終結果
        return $final_result;
    }
}
