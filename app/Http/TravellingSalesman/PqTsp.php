<?php

namespace App\Http\TravellingSalesman;

use SplPriorityQueue;

class PqTsp extends SplPriorityQueue
{
    public function compare($lhs, $rhs)
    {
        if ($lhs === $rhs) return 0;
        return ($lhs < $rhs) ? 1 : -1;
    }
}

