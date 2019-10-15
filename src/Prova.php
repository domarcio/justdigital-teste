<?php

namespace App;

class Prova
{

    public function QuestaoUm(int $n, array $arr)
    {
        $arr = array_count_values($arr);
        $new = [];

        asort($arr);
        $repeated = [];
        foreach ($arr as $number => $total) {
            if ($total === 1) {
                $new[] = $number;
                continue;
            }
            $repeated[] = array_fill(1, $total, $number);
        }

        asort($new);
        array_map(function ($value) use (&$new) {
            $new = array_merge($new, $value);
        }, $repeated);

        return $new;
    }

    public function QuestaoDois(int $n)
    {
        $fibonacciNumber = 0;
        $lastResult      = 1;
        $next            = 0;

        $result = [];
        for ($x = 1; $x <= $n; $x++) {
            $result[] = $fibonacciNumber;
            $next = $fibonacciNumber + $lastResult;
            $lastResult = $fibonacciNumber;
            $fibonacciNumber = $next;
        }

        return $result;
    }

    public function QuestaoTres(string $s)
    {
        $magicString = $s;
        $total       = 0;
        $length      = strlen($magicString);

        $nextSearch = [];
        for ($i = 0; $i < $length; ++$i) {
            $vowel = $magicString[$i];

            if (0 === $total && 'a' === $vowel) {
                $total += 1;
                $nextSearch = ['a', 'e'];
                continue;
            }

            if (! in_array($vowel, $nextSearch)) {
                continue;
            }

            if ('a' === $vowel) {
                $total += 1;
            }
            if ('e' === $vowel) {
                $total += 1;
                $nextSearch = ['e', 'i'];
            }
            if ('i' === $vowel) {
                $total += 1;
                $nextSearch = ['i', 'o'];
            }
            if ('o' === $vowel) {
                $total += 1;
                $nextSearch = ['o', 'u'];
            }
            if ('u' === $vowel) {
                $total += 1;
                $nextSearch = ['u'];
            }
        }

        // Se for maior do que 1, então eu sei que a última vogal encontrada NÃO FOI O "u", logo não contém todas as vogais
        if (count($nextSearch) > 1) {
            return 0;
        }

        return $total;
    }

    public function QuestaoQuatro(int $n, array $a, array $b, array $v)
    {

    }
}
