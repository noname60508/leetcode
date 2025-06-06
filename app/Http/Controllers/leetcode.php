<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class leetcode extends Controller
{
    function hello(Request $request)
    {
        return 'hello';
        return $request->all();
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
            'a' => ".-",
            'b' => "-...",
            'c' => "-.-.",
            'd' => "-..",
            'e' => ".",
            'f' => "..-.",
            'g' => "--.",
            'h' => "....",
            'i' => "..",
            'j' => ".---",
            'k' => "-.-",
            'l' => ".-..",
            'm' => "--",
            'n' => "-.",
            'o' => "---",
            'p' => ".--.",
            'q' => "--.-",
            'r' => ".-.",
            's' => "...",
            't' => "-",
            'u' => "..-",
            'v' => "...-",
            'w' => ".--",
            'x' => "-..-",
            'y' => "-.--",
            'z' => "--.."
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

    function singleNumber($nums = [2, 2, 1])
    {
        $arr = $nums;
        foreach ($nums as $key => $num) {
            for ($i = $key + 1; $i < count($nums); $i++) {
                if ($num == $nums[$i]) {
                    array_splice($arr, $key);
                    array_splice($arr, $i);
                    break;
                }
            }
        }
        return $arr;
    }

    function stringMatching($words = ["leetcoder", "leetcode", "od", "hamlet", "am"])
    {
        // dd(strpos('leetcoder', 'leetcode'));
        $ans = [];
        foreach ($words as $outValue) {
            foreach ($words as $inValue) {
                if (substr_count($inValue, $outValue) > 0 && ($outValue !== $inValue)) {
                    $ans[] = $outValue;
                    break;
                }
            }
        }
        return $ans;
    }

    function addBinary($a, $b)
    {
        $newA = base_convert($a, 2, 10);
        $newB = base_convert($b, 2, 10);
        $ans = $newA + $newB;
        return base_convert($ans, 10, 2);
    }

    function setForeach()
    {
        // 讀取 JSON 檔案內容
        $jsonData = file_get_contents("C:/Users/10231/Downloads/契約工項詳細表object數據.json");

        // 將 JSON 資料轉換為 PHP 陣列（或物件）
        $data = collect(json_decode($jsonData, true)); // 第二個參數 true 表示要轉換為關聯陣列
        $lastLevel = $data->pluck('levelNo')->max();
        $data = $data->groupBy('levelNo');
        // return $data;

        $nowLevel = [];
        while ($lastLevel > 0) {
            $nextLevel = $nowLevel;
            $nowLevel = [];
            foreach ($data[$lastLevel] as $key => $value) {
                $nextLevelKey = substr($value['printNo'], 0, -4);

                if (empty($nextLevelKey)) {
                    $nextLevelKey = 0;
                }

                $nowLevel[$nextLevelKey][] = [
                    'printNo' => $value['printNo'],
                    'itemNo' => $value['itemNo'],
                    'levelNo' => $value['levelNo'],
                    'cName' => $value['cName'],
                    'unitName' => $value['unitName'],
                    'A_QTY' => $value['A_QTY'],
                    'R_QTY' => $value['R_QTY'],
                    'QTY_Difference' => $value['QTY_Difference'],
                    'cost' => $value['cost'],
                    'A_AMOUNT' => $value['A_AMOUNT'],
                    'R_AMOUNT' => $value['R_AMOUNT'],
                    'kind' => $value['kind'],
                    'pccesCode' => $value['pccesCode'],
                    'memo' => $value['memo'],
                    'nextLevel' => $nextLevel[$value['printNo']] ?? [],
                ];
            }

            $lastLevel--;
        }

        return $nowLevel;
    }

    function findDuplicate($nums = [1, 3, 4, 2, 2])
    {
        $numCount = array_count_values($nums);
        $maxNum = array_keys($numCount, max($numCount));

        return $maxNum[0];
    }

    function leastInterval($tasks = ["A", "A", "A", "B", "B", "B"], $n = 2)
    {
        $taskCounts = array_count_values($tasks);
        $maxFrequency = max($taskCounts);
        $maxFreqTasks = count(array_filter($taskCounts, function ($freq) use ($maxFrequency) {
            return $freq == $maxFrequency;
        }));
        return $maxFreqTasks;
    }

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function findDuplicates($nums = [4, 3, 2, 7, 8, 2, 3, 1])
    {
        $output = [];
        foreach (array_count_values($nums) as $key => $value) {
            if ($value > 1)
                $output[] = $key;
        }

        return $output;
    }
    function findDuplicatesV2($nums = [4, 3, 2, 7, 8, 2, 3, 1])
    {
        $output = [];
        sort($nums);
        foreach ($nums as $key => $num) {
            if (($nums[$key - 1] ?? null) == $num)
                $output[] = $num;
        }

        return $output;
    }

    function maxSubarrayLength($nums = [1, 2, 3, 1, 2, 3, 1, 2], $k = 2)
    {
        $ans = 0;
        $array_count_values = array_count_values($nums);

        foreach ($array_count_values as $value) {
            if ($value >= $k)
                $ans++;
        }

        return $ans * $k;
    }

    function minOperations($nums = [2, 1, 3, 4], $k = 1)
    {
        foreach ($nums as $value) {
            $k = $k ^ $value;
        }
        // return $k;

        $ans = 0;
        while ($k > 0) {
            // 檢查二進制最右邊的位數是不是=1
            if ($k & 1)
                $ans++;

            // 往右移一位
            $k >>= 1;
        }
        return $ans;
    }

    function numSteps($s = "1111110011101010110011100100101110010100101110111010111110110010") {}

    function numSteps2($s = "1111110011101010110011100100101110010100101110111010111110110010")
    {
        $ans = 0;

        while (strlen($s) > 0) {
            $lastKey = strlen($s) - 1;
            if ($s[$lastKey] == 0) {
                $s = substr($s, 0, $lastKey);
            } else {
                $revS = strrev($s);
                $arrS = str_split($revS);
                for ($i = 0; $i <= $lastKey; $i++) {
                    if ($arrS[$i] == 0) {
                        $arrS[$i] = 1;
                        break;
                    } else {
                        $arrS[$i] = 0;
                    }
                }
                $s = strrev(implode($arrS));
            }

            $ans++;
        }
        return $ans;
    }

    function addedInteger($nums1 = [2, 6, 4], $nums2 = [9, 7, 5])
    {
        return min($nums2) - min($nums1);
        sort($nums1);
        sort($nums2);
        return $nums2[0] - $nums1[0];
    }

    public function test()
    {
        $matches = [];
        $geom_str_sub = 'POLYGON ((306039.34589278046 2772309.8527636547, 306039.44109070027 2772309.8669301355, 306040.33259202167 2772309.9660140891, 306041.67662717897 2772310.0652109683, 306044.41116573405 2772310.2951552691, 306047.59149931226 2772310.565999493, 306051.8492748253 2772310.9274039017, 306055.69277490594 2772311.2578750062, 306060.95391343394 2772311.7040768578, 306064.9736394147 2772312.0309371348, 306068.79835309775 2772312.3707505269, 306074.73731249676 2772312.8535561603, 306077.01723386347 2772313.0634781485, 306081.27837115881 2772313.4060388631, 306086.08679238416 2772313.831240755, 306093.07459507603 2772314.3993625217, 306097.73888468748 2772314.7754948945, 306102.80943039956 2772315.2206776175, 306106.98501786037 2772315.5810726876, 306111.53398601641 2772315.9681347879, 306123.20123722882 2772316.9790572491, 306127.69188043615 2772317.3533340651, 306131.59603895067 2772317.715707955, 306132.58705088578 2772317.8162280763, 306134.79737369437 2772317.9909452596, 306136.61815074075 2772318.1634940086, 306140.70894582343 2772318.5455852593, 306148.67141140881 2772319.224440197, 306155.03522943385 2772319.7486228836, 306164.21567414363 2772320.483415849, 306172.68582944706 2772321.1604678314, 306183.72044527065 2772322.0487122829, 306187.959161114 2772322.3754705628, 306189.45395393163 2772322.4993167683, 306189.86610313918 2772322.53452492, 306190.24989704846 2772322.6223178483, 306190.54382001725 2772322.7375663528, 306190.89526728942 2772322.8668332035, 306191.1702128172 2772323.0167237069, 306191.420017704 2772323.1486375779, 306191.70393761242 2772323.3402746734, 306191.60237271595 2772325.3141112444, 306191.15213506483 2772325.0568903624, 306190.62677381473 2772324.882409093, 306190.21939294128 2772324.767712357, 306189.71408028004 2772324.6421667603, 306189.1355159955 2772324.5802711635, 306184.89802877657 2772324.2130795107, 306172.92787967611 2772323.2425086033, 306169.90196149051 2772323.0094647133, 306159.26111045643 2772322.0811643526, 306155.58250407927 2772321.7634043284, 306146.728832448 2772320.8780116145, 306139.21439303533 2772320.1764128441, 306134.75516884634 2772319.7864183313, 306126.4072975996 2772319.2288404354, 306116.64262442425 2772318.3691454413, 306110.26562489232 2772317.8576755021, 306104.33777455433 2772317.364354067, 306104.32914981339 2772317.1386710554, 306097.6069038664 2772316.7617119774, 306093.81174357334 2772316.4363567242, 306079.35642032215 2772315.3130813581, 306075.20821502164 2772314.9596391572, 306061.18012351455 2772313.7994007822, 306057.23631924158 2772313.4811625639, 306054.55505890894 2772313.2680850471, 306052.17043253605 2772313.0610135072, 306048.57109073288 2772312.76915671, 306043.20695731882 2772312.3410233622, 306041.04578825948 2772312.1732054497, 306039.69069302303 2772312.0632141936, 306039.51632007782 2772312.0550026172, 306039.36220559955 2772312.0635404089, 306039.19968947745 2772312.1103560077, 306039.07543762354 2772312.2119010361, 306038.99834435747 2772312.3606508421, 306038.94337475311 2772312.5047026188, 306039.34589278046 2772309.8527636547)), LINESTRING (306039.34589278046 2772309.8527636547, 306039.34589277988 2772309.8527636547)';
        preg_match_all('/[A-Za-z]+\s\([\(0-9\.\s\,\)]+\)/', $geom_str_sub, $matches);
        return $matches[0];
    }

    function minMovesToSeat($seats = [3, 1, 5], $students = [2, 7, 4])
    {
        sort($seats);
        sort($students);
        $ans = 0;

        for ($i = 0; $i < count($seats); $i++) {
            $move = $students[$i] - $seats[$i];
            $ans += abs($move);
        }
        return $ans;
    }

    function merge(&$nums1 = [1, 2, 3, 0, 0, 0], $m = 3, $nums2 = [2, 5, 6], $n = 3)
    {
        $nums1 = array_slice($nums1, 0, $m);
        $nums2 = array_slice($nums2, 0, $n);

        $nums1 = array_merge($nums1, $nums2);
        sort($nums1);
    }

    function maxSatisfied($customers = [1, 0, 1, 2, 1, 1, 7, 5], $grumpy = [0, 1, 0, 1, 0, 1, 0, 1], $minutes = 3)
    {
        $grumpy0 = 0;
        $customersSum = 0;
        $maxCustomersSum = 0;

        for ($i = 0; $i < count($customers); $i++) {
            if ($grumpy[$i] === 0) {
                $grumpy0 += $customers[$i];
            }

            if ($i < $minutes) {
                if ($grumpy[$i] === 1)
                    $customersSum += $customers[$i];
                $maxCustomersSum = $customersSum;
            } else {
                if ($grumpy[$i] === 1) {
                    $customersSum += $customers[$i];
                }

                if ($grumpy[$i - $minutes] === 1) {
                    $customersSum -= $customers[$i - $minutes];
                }

                $maxCustomersSum = max($maxCustomersSum, $customersSum);
            }
        }

        return $grumpy0 + $maxCustomersSum;
    }

    function threeConsecutiveOdds($arr = [2, 6, 4, 1])
    {
        $check = 0;
        foreach ($arr as $value) {
            if ($value % 2 === 1) {
                $check++;
            } else {
                $check = 0;
            }

            if ($check == 3)
                return true;
        }
        return false;
    }

    function mergeAlternately($word1 = "abc", $word2 = "pqr")
    {
        // 0 2 4
        // 1 3 5
        $ans = [];
        for ($i = 0; $i < strlen($word1); $i++) {
            $ans[$i * 2] = $word1[$i];
        }
        for ($i = 0; $i < strlen($word2); $i++) {
            $ans[($i * 2) + 1] = $word2[$i];
        }
        ksort($ans);

        return implode("", $ans);
    }

    function intersect($nums1 = [1, 2, 2, 1], $nums2 = [2])
    {
        $ans = [];
        if (count($nums1) === 0 || count($nums2) === 0)
            return $ans;

        foreach ($nums1 as $value) {
            if (is_numeric($search = array_search($value, $nums2))) {
                // return $search;
                $ans[] = $value;
                unset($nums2[$search]);
            }
            // $a[] = $search;
        }

        return $ans;
    }

    function gcdOfStrings($str1 = "ABCABC", $str2 = "ABC")
    {
        if ($str1 . $str2 !== $str2 . $str1)
            return '';
    }

    function minDifference($nums = [20, 75, 81, 82, 95])
    {
        $minNums = $maxNums = $nums;
        $min = min($minNums);
        for ($i = 0; $i < 3; $i++) {
            $minNums[array_search(max($minNums), $minNums)] = $min;
        }
        $minDiff = max($minNums) - min($minNums);

        $max = max($maxNums);
        for ($i = 0; $i < 3; $i++) {
            $maxNums[array_search(min($maxNums), $maxNums)] = $max;
        }
        $maxDiff = max($maxNums) - min($maxNums);

        return min($maxDiff, $minDiff);
    }
    function kthDistinct($arr = ["a", "b", "a"], $k = 3)
    {
        $num = 0;
        $countArr = array_count_values($arr);
        foreach ($arr as $value) {
            if ($countArr[$value] == 1) {
                $num++;
                if ($num == $k)
                    return $value;
            }
        }
        return '';
    }
    function lemonadeChange($bills = [5, 5, 5, 10, 20])
    {
        $getMoney = [
            20 => 0,
            10 => 0,
            5  => 0,
        ];

        foreach ($bills as $bill) {
            if ($bill != 5) {
                $giveChange = $bill - 5;
                foreach ($getMoney as $banknote => $count) {
                    $giveCount = (int) ($giveChange / $banknote);
                    // 如果可以找的鈔票數量超過現在有的
                    if ($giveCount > $count) {
                        $giveChange = $giveChange - ($banknote * $count);
                        $getMoney[$banknote] = 0;
                    } else {
                        $giveChange = $giveChange - ($banknote * $giveCount);
                        $getMoney[$banknote] -= $giveCount;
                    }
                }

                if ($giveChange > 0) return false;
                $getMoney[$bill]++;
            } else {
                $getMoney[5]++;
            }
        }

        return true;
    }

    function kidsWithCandies($candies = [2, 3, 5, 1, 3], $extraCandies = 3)
    {
        $max = max($candies);
        foreach ($candies as $candie) {
            $ans[] = $candie + $extraCandies < $max ? false : true;
        }
        return $ans;
    }

    function reverseWords($s = "  hello world  ")
    {
        $explode = explode(" ", $s);
        // return array_diff(array_reverse($explode), ['']);

        $ans = null;
        foreach (array_diff(array_reverse($explode), ['']) as $value) {
            if (is_null($ans)) {
                $ans = $value;
            } else {
                $ans .= ' ' . $value;
            }
        }
        return $ans;
    }

    function pickGifts(&$gifts = [25, 64, 9, 4, 100], $k = 4)
    {
        // $gifts = &$gifts;
        for ($i = 0; $i < $k; $i++) {
            $key = array_search(max($gifts), $gifts);
            $gifts[$key] = (int) sqrt(max($gifts));
        }
        return array_sum($gifts);
    }

    function longestMonotonicSubarray($nums = [1, 4, 3, 3, 2])
    {
        $ans = 0;
        $maxKey = count($nums);
        foreach ($nums as $key => $value) {
            $increasing = 0;
            $decreasing = 0;
            for ($i = $key; $i < $maxKey; $i++) {
                $increasing++;
                if (!($nums[$i] < ($nums[$i + 1] ?? null)))
                    break;
            }
            for ($i = $key; $i < $maxKey; $i++) {
                $decreasing++;
                if (!($nums[$i] > ($nums[$i + 1] ?? null)))
                    break;
            }

            $ans = max($ans, $increasing, $decreasing);
        }
        return $ans;
    }

    function maxAscendingSum($nums = [10, 20, 30, 5, 10, 50])
    {
        $ans = 0;
        $sum = 0;
        foreach ($nums as $key => $value) {
            if ($value > ($nums[$key - 1] ?? 0)) {
                $sum += $value;
                $ans = max($ans, $sum);
            } else {
                $sum = $value;
            }
        }

        return $ans;
    }

    function tupleSameProduct($nums = [1, 2, 4, 5, 10, 20])
    {
        for ($a = 0; $a < count($nums); $a++) {
            for ($b = $a + 1; $b < count($nums); $b++) {
                $sum[$nums[$a] * $nums[$b]][] = [$nums[$a], $nums[$b]];
            }
        }

        // foreach ($sum as $key => $value) {
        // }
        return $sum;
    }

    function countLargestGroup($n = 13)
    {
        $group = [];
        for ($i = 1; $i <= $n; $i++) {
            $key = array_sum(str_split($i));
            $group[$key] = empty($group[$key]) ? 1 : $group[$key] + 1;
        }

        $array_count_values = array_count_values($group);
        return $array_count_values[max($group)];
    }

    function countCompleteSubarrays($nums = [1934, 782, 126, 126, 1283, 789, 1730, 1966, 243, 126, 835, 314, 1134, 783, 864, 1595, 787, 1827, 840, 783, 243, 100, 600, 783, 1906, 1103, 783, 1906, 1554, 1557, 1619, 1572, 126, 999, 211, 1396, 130, 562, 1906, 668, 1554, 1344, 1689, 1938, 211, 1569, 1709, 315, 1934, 675, 181, 770, 1422, 1924, 76, 1326, 999, 1588, 227, 727, 436, 275, 783, 783, 1689, 1810, 738, 1015, 275, 612, 1093, 791, 1411, 1655, 1588, 126, 1053, 783, 980, 939, 1569, 999, 1788, 1371, 243, 335, 1906, 219, 85, 1788, 1966, 831, 930, 831, 1924, 1066, 426, 728, 1271, 543, 1403, 1469, 1641, 1921, 624, 126, 1268, 209, 1269, 1186, 1432, 1696, 1906, 566, 117, 1707, 138, 630, 1172, 1578, 399, 904, 1715, 29, 1904, 724, 1827, 1934, 1758, 98, 580, 6, 861, 6, 1235, 737, 1669, 1812, 630, 612, 637, 232, 518, 1579, 1027, 47, 1759, 1124, 848, 973, 839, 1846, 1672, 785, 1947, 316, 1345, 861, 1235, 1953, 1186, 1115, 23, 1792, 504, 1030, 230, 1698, 1689, 1572, 1494, 614, 986, 789, 1280, 528, 869, 1750, 282, 1827, 275, 895, 199, 841, 211, 592, 756, 770, 436, 1209, 538, 1689, 1620, 1550, 1906, 1506, 1630, 1494, 1289, 877, 1737, 1554, 1456, 1300, 1875, 916, 783, 436, 1473, 796, 623, 959, 519, 96, 210, 993, 181, 209, 23, 1359, 1539, 310, 399, 1906, 1651, 344, 488, 1456, 124, 740, 1253, 1014, 126, 10, 1253, 1160, 1401, 624, 1091, 710, 1344, 147, 1300, 932, 185, 1186, 203, 277, 720, 1182, 117, 879, 426, 264, 276, 1004, 710, 1738, 39, 1712, 225, 357, 1502, 330, 20, 487, 197, 1617, 1296, 329, 1353, 1839, 436, 1894, 227, 1689, 1437, 518, 1870, 924, 1101, 1053, 1854, 1554, 1540, 1955, 1182, 980, 1649, 1431, 739, 468, 1053, 1044, 400, 1885, 199])
    {
        $array_unique = array_values(array_unique($nums));
        $array_unique_count = count($array_unique);
        $ans = 0;

        for ($i = 0; $i < count($nums); $i++) {
            $arr = [];
            $arr_count = 0;
            for ($j = $i; $j < count($nums); $j++) {
                if (!in_array($nums[$j], $arr)) {
                    $arr[] = $nums[$j];
                    $arr_count++;
                }
                // echo json_encode([$arr_count, $array_unique_count]) . PHP_EOL;

                if ($arr_count == $array_unique_count) {
                    $ans++;
                }
            }
            // echo PHP_EOL;
        }

        return $ans;
    }

    function countSubarrays($nums = [1, 1, 1, 1], $minK = 1, $maxK = 1)
    {
        $ans = 0;

        for ($i = 0; $i < count($nums); $i++) {
            $arr = [];
            for ($j = $i; $j < count($nums); $j++) {
                if ($nums[$j] >= $minK && $nums[$j] <= $maxK) {
                    $arr[] = $nums[$j];
                    if (in_array($minK, $arr) && in_array($maxK, $arr)) {
                        $ans++;
                    }
                } else {
                    break;
                }
            }
        }

        return $ans;
    }

    function countSubarrays2962($nums = [2, 2, 2, 2, 1, 3, 3, 2, 2, 1, 1, 3, 1, 1, 2, 3, 2, 1, 1, 2, 1, 1, 2, 1, 2, 1, 2, 1, 3, 1, 3, 3], $k = 5)
    {
        $ans = 0;
        $max = max($nums);

        for ($i = 0; $i < count($nums); $i++) {
            $count = 0;
            for ($j = $i; $j < count($nums); $j++) {
                if ($max == $nums[$j]) {
                    $count++;
                }
                if ($count >= $k) {
                    $ans++;
                }
            }
        }

        return $ans;
    }

    function differenceOfSums($n = 10, $m = 3)
    {
        $divisible = 0;
        $notDivisible = 0;
        for ($i = 1; $i <= $n; $i++) {
            if ($i % $m == 0) {
                $divisible += $i;
            } else {
                $notDivisible += $i;
            }
        }

        return $notDivisible - $divisible;
    }

    function findWordsContaining($words = ["abc", "bcd", "aaaa", "cbc"], $x = "a")
    {
        $ans = [];
        foreach ($words as $key => $word) {
            if (strpos($word, $x) !== false) {
                $ans[] = $key;
            }
        }
        return $ans;
    }

    function smallestEquivalentString($s1 = "cgokcgerolkgksgbhgmaaealacnsshofjinidiigbjerdnkolc", $s2 = "rjjlkbmnprkslilqmbnlasardrossiogrcboomrbcmgmglsrsj", $baseStr = "bxbwjlbdazfejdsaacsjgrlxqhiddwaeguxhqoupicyzfeupcn")
    {
        $arr = [];
        $useAlphabet = [];
        $ans = '';

        for ($i = 0; $i < strlen($s1); $i++) {
            if (array_key_exists($s1[$i], $useAlphabet) || array_key_exists($s2[$i], $useAlphabet)) {
                foreach ($arr as $key => $value) {
                    if (in_array($s1[$i], $value) || in_array($s2[$i], $value)) {
                        $arr[$key][$s1[$i]] = $s1[$i];
                        $arr[$key][$s2[$i]] = $s2[$i];
                        $useAlphabet[$s1[$i]] = $key;
                        $useAlphabet[$s2[$i]] = $key;
                        break;
                    }
                }
            } else {
                $arr[] = [$s1[$i] => $s1[$i], $s2[$i] => $s2[$i]];
                $useAlphabet[$s1[$i]] = count($arr) - 1;
                $useAlphabet[$s2[$i]] = count($arr) - 1;
            }
        }
        return ["arr" => $arr, "useAlphabet" => $useAlphabet];

        for ($i = 0; $i < strlen($baseStr); $i++) {
            if (array_key_exists($baseStr[$i], $useAlphabet)) {
                $ans .= min($arr[$useAlphabet[$baseStr[$i]]]);
            } else {
                $ans .= $baseStr[$i];
            }
        }
        return $ans;
    }
}
