<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class test extends Controller
{
    function hello(Request $request)
    {
        return $request->all();
        return 'hello';
    }

    function romanToInt($s = "MCMXCIV")
    {
        $num = [
            'IV' => 4,
            'IX' => 9,
            'XL' => 40,
            'XC' => 90,
            'CD' => 400,
            'CM' => 900,
        ];
        $num2 = [
            'I'  => 1,
            'V'  => 5,
            'X'  => 10,
            'L'  => 50,
            'C'  => 100,
            'D'  => 500,
            'M'  => 1000,
        ];

        $ans = 0;
        $s = str_split($s);
        for ($i = 0; $i < count($s); $i++) {
            if (array_key_exists($s[$i] . ($s[$i + 1] ?? ''), $num)) {
                $ans = $ans + $num[$s[$i] . ($s[$i + 1] ?? '')];
                $i++;
            } else {
                $ans += $num2[$s[$i]];
            }
        }
        return $ans;
    }

    function firstUniqChar($s = "loveleetcode")
    {
        $arr = str_split($s);
        $count = array_count_values($arr);
        foreach ($count as $key => $value) {
            if ($value == 1) {
                $search = array_search($key, $arr);
                $nonRepeating[$search] = $key;
            }
        }
        if (empty($nonRepeating)) {
            return -1;
        } else {
            return array_search(reset($nonRepeating), $arr);
        }
        return $nonRepeating;
    }

    function uniqueMorseRepresentations($words = ["gin", "zen", "gig", "msg"])
    {
        $disc = [
            'a' => ".-", 'b' => "-...", 'c' => "-.-.", 'd' => "-..", 'e' => ".", 'f' => "..-.", 'g' => "--.", 'h' => "....", 'i' => "..", 'j' => ".---", 'k' => "-.-", 'l' => ".-..", 'm' => "--", 'n' => "-.", 'o' => "---", 'p' => ".--.", 'q' => "--.-", 'r' => ".-.", 's' => "...", 't' => "-", 'u' => "..-", 'v' => "...-", 'w' => ".--", 'x' => "-..-", 'y' => "-.--", 'z' => "--.."
        ];
        foreach ($words as $word) {
            $word = str_split($word);
            $morse = '';
            foreach ($word as $value) {
                $morse = $morse . $disc[$value];
            }
            $ans[] = $morse;
        }
        return count(array_unique($ans));
    }

    function minSetSize($arr = [3, 3, 3, 3, 5, 5, 5, 2, 2, 7])
    {
        $arrCount = array_count_values($arr);
        arsort($arrCount);

        $sum = 0;
        $ans = 0;
        foreach ($arrCount as $value) {
            if ($sum < (count($arr) / 2)) {
                $sum = $sum + $value;
                $ans++;
            }
        }
        return $ans;
    }

    function isPowerOfFour($n = -2147483648)
    {
        if ($n == 1) return true;
        if ($n <= 0) return false;
        while (is_int($n)) {
            $n = $n / 4;
            if ($n == 1 && is_int($n)) {
                return true;
            }
        }
        return false;
    }

    function canConstruct($ransomNote = "ab", $magazine = "aab")
    {
        $ransomNote = str_split($ransomNote);
        $magazine = str_split($magazine);

        $ransomNoteCount = array_count_values($ransomNote);
        $magazineCount = array_count_values($magazine);

        foreach ($ransomNoteCount as $key => $value) {
            if ($ransomNoteCount[$key] > $magazineCount[$key])
                return false;
        }
        return true;
    }

    function rotate(&$matrix = [[5, 1, 9, 11], [2, 4, 8, 10], [13, 3, 6, 7], [15, 14, 12, 16]])
    {
        $count = count($matrix);
        foreach ($matrix as $values) {
            $count--;
            foreach ($values as $key => $value) {
                $matrix[$key][$count] = $value;
            }
        }
        return $matrix;
    }

    function largestPerimeter($nums = [3, 6, 2, 3])
    {
        rsort($nums);
        $n = 0;
        while ($n <= count($nums) - 3) {
            if ($nums[$n] < $nums[($n + 1)] + $nums[($n + 2)]) {
                return $nums[$n] + $nums[($n + 1)] + $nums[($n + 2)];
            } else {
                $n++;
            }
        }
        return 0;
    }

    function checkIfPangram($sentence = "thequickbrownfoxjumpsoverthelazydog")
    {
        $sentence = str_split($sentence);
        // return array_count_values($sentence);
        $arr = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        foreach ($arr as $value) {
            if (array_search($value, $sentence) === false)
                return false;
        }
        return true;
    }

    function countAndSay($n = 5)
    {
        if ($n == 1)
            return '1';
        $ans = [1];
        $numCount = 0;
        for ($i = 2; $i <= $n; $i++) {
            $countAndSay = $ans;
            $ans = [];
            foreach ($countAndSay as $key => $value) {
                $numCount++;
                if ($countAndSay[$key] != ($countAndSay[$key + 1] ?? null)) {
                    $ans[] = $numCount;
                    $ans[] = $value;
                    $numCount = 0;
                }
            }
            // if ($i == 3) return $ans;
        }
        return implode($ans);
    }

    function topKFrequent($words = ["i", "love", "leetcode", "i", "love", "coding"], $k = 4)
    {
        sort($words);
        $array_count_values = array_count_values($words);
        arsort($array_count_values);
        foreach ($array_count_values as $key => $value) {
            $ans[] = $key;
            if (count($ans) == $k)
                break;
        }
        return $ans;
    }

    function diffArray()
    {
        $csv = ['3642-0571', '3740-0127', '3740-0740', '3462-0027', '3462-0057', '3642-0409', '3461-0003', '3642-0572', '3642-0610', '3642-0631', '3642-0717', '3642-1141', '3742-0253', '3742-0383', '3745-0344', '3642-0632', '3642-1139', '3742-0384', '3742-0387', '3742-0390', '3744-1149', '3762-0042', '3762-0546', '3762-0574', '3462-0054', '3642-0414', '3642-0627', '3763-0018', '3763-0039', '3763-0410', '3762-0001', '3762-0122', '3762-0581', '3762-0029', '3762-0192', '3763-0065', '3643-0089', '3643-0632', '3740-0717', '3462-0058', '3642-0032', '3642-1140', '3763-0469', '3763-0482', '3763-1508', '3763-0409', '3763-0423', '3763-1241', '3763-0638', '3844-0820', '3846-0002', '3740-0750', '3741-0330', '3742-0236', '3643-0077', '3740-0123', '3740-0145', '3563-0009', '3663-0232',];
        $sql = ['3359-0031', '3359-0032', '3359-0084', '3360-0114', '3361-0020', '3361-0122', '3361-0126', '3461-0003', '3462-0027', '3462-0054', '3462-0055', '3462-0056', '3462-0057', '3462-0058', '3462-0059', '3563-0009', '3641-0269', '3642-0028', '3642-0032', '3642-0123', '3642-0156', '3642-0169', '3642-0404', '3642-0408', '3642-0409', '3642-0414', '3642-0415', '3642-0564', '3642-0571', '3642-0572', '3642-0610', '3642-0616', '3642-0627', '3642-0631', '3642-0632', '3642-0660', '3642-0693', '3642-0717', '3642-0765'];
        return array_diff($csv, $sql);
    }

    function minMutation($start = "AACCGGTT", $end = "AAACGGTA", $bank = ["AACCGGTA", "AACCGCTA", "AAACGGTA"])
    {
        $arrStart = str_split($start);
        $arrEnd = str_split($end);
        $arrChange = $arrStart;
        $ans = 0;
        for ($i = 0; $i < 8; $i++) {
            if ($arrStart[$i] != $arrEnd[$i]) {
                $arrChange[$i] = $arrEnd[$i];
                return implode("", $arrChange);
                if (!in_array(implode("", $arrChange), $bank)) {
                    return false;
                }
                $ans++;
            }
        }
        return $ans;
    }

    function reverseVowels($s = " ")
    {
        $arr = str_split($s);
        foreach ($arr as $key => $value) {
            if ($value == 'a' || $value == 'A' || $value == 'e' || $value == 'E' || $value == 'i' || $value == 'I' || $value == 'o' || $value == 'O' || $value == 'u' || $value == 'U') {
                $vowels[$key] = $value;
            }
        }
        if (empty($vowels))
            return $s;
        $reverse = array_reverse($vowels);
        $a = 0;
        foreach ($vowels as $key => $value) {
            $arr[$key] = $reverse[$a];
            $a++;
        }
        $ans = implode('', $arr);
        return $ans;
    }

    function maximum69Number($num = 696)
    {
        $arr = str_split($num);
        $search = array_search(6, $arr);
        if ($search === false) return $num;
        $arr[$search] = 9;
        return implode($arr);
    }

    function makeGood($s = "kkdsFuqUfSDKK")
    {
        $arr = str_split($s);
        $arr2 = $arr;
        while (!empty($arr)) {
            foreach ($arr2 as $key => $value) {
                if (ord($value) === ord(($arr2[($key + 1)] ?? '')) + 32 || ord(($arr2[($key + 1)] ?? '')) === ord($value) + 32) {
                    array_splice($arr2, $key, 2);
                    break;
                }
            }
            if ($arr === $arr2) {
                break;
            } else {
                $arr = $arr2;
            }
        }
        return implode($arr);
    }

    function removeDuplicates(&$nums = [0, 0, 1, 1, 1, 2, 2, 3, 3, 4])
    {
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] === null) {
                continue;
            }
            $diffNum = $nums[$i];
            $nums = array_diff($nums, [$diffNum]);
            $nums[$i] = $diffNum;
            ksort($nums);
            $nums = array_values($nums);
        }
        return count($nums);
    }

    public function guess($num, $pick = 2)
    {
        if ($num > $pick) {
            return -1;
        } elseif ($num < $pick) {
            return 1;
        } else {
            return 0;
        }
    }
    function guessNumber($n = 2)
    {
        $start = 1;
        $end = $n;
        while (1 == 1) {
            $mid = ($end + $start) / 2;
            $guess = $this->guess($mid);
            if ($guess === 1) {
                $start = $mid;
            } elseif ($guess === -1) {
                $end = $mid;
            } else {
                return $mid;
            }
        }
    }

    function uniqueOccurrences($arr = [-130, 21, -154, 159, -44, -126, 165, 68, -126, -126, -126, 128, -94, 165, -30, -44, -39, -94, 21, -130, 68, 68, 128, -130, -39, 181, 68, 68, 68, 139, 139, -39, 21, 21, -39, 68, 128, 131, -126, -154, -30, 165, 21, 159, 181, -39, -126, 131, -94, -44, 131, 128, 21, -44, 128, -94, 183, -94, 131, 139, -44, 128, 21, 181, -44, 131, 128, 131, 21, 68, 181, -44, -126, -130, 131, -190, 131, 181, 165, -94, 165, 165, -30, -154, 68, -39, -44, 165, -39, -126, 68, 68, -130, 68, -94, 181, -44, 131, 21, 183, -44, 21, -39, -130, -39, 131, 21, 165, 165, -126, 165, -44, -94, 68, 68, -94, -126, -126, -30, 181, 165, 68, -44, -39, -94, -126, -126, -30, 68, 181, -44, -94, -126, -44, -94, -30, 131, 165, -190, -130, -94, -94, 181, 128, 181, 181, 181, 139, -130, -94, -130, -130, 139, -130, -90, -154, 181, 165, -30, -154, 165, -190, 159, 165, 139, -126, -44, 131, -44, -190, -126, -130, -94, 128, -154, 68, -130, -130, 68, 21, -44, -30, -126, -126, 131, 159, -190, -126, 181, 139])
    {
        $arrNum = array_values(array_count_values($arr));
        sort($arrNum);
        foreach ($arrNum as $key => $value) {
            if ($value == ($arrNum[($key + 1)] ?? 0)) {
                return false;
            }
        }
        return true;
    }

    function minDeletionSize($strs = ["bybffvl", "kbnknxg", "lezkoaf", "mhmuvsn", "wpkxwyi", "whgzxno"])
    {
        $ans = 0;
        for ($key = 0; $key < strlen($strs[0]); $key++) {
            $ascii = 0;
            for ($a = 0; $a < count($strs); $a++) {
                $nowAscii = ord(substr($strs[$a], $key));
                if ($nowAscii >= $ascii) {
                    $ascii = $nowAscii;
                } else {
                    $ans++;
                    break;
                }
            }
        }
        return $ans;
    }

    function maxIceCream($costs = [1, 3, 2, 4, 1], $coins = 7)
    {
        sort($costs);
        $ans = 0;
        foreach ($costs as $value) {
            $coins = $coins - $value;
            if ($coins >= 0) {
                $ans++;
            } else {
                break;
            }
        }
        return $ans;
    }
}
