<?php

function maxSeating(array $seats)
{
    $count = 0;
    $n = count($seats);

    for ($i = 0; $i < $n; $i++) {
        $ll = $i - 2 < 0 ? 0 : $seats[$i - 2];
        $l = $i - 1 < 0 ? 0 : $seats[$i - 1];
        $mid = $seats[$i];
        $r = $i + 1 >= $n ? 0 : $seats[$i + 1];
        $rr = $i + 2 >= $n ? 0 : $seats[$i + 2];

        if ([$ll, $l, $mid, $r, $rr] === [0, 0, 0, 0, 0]) {
            $seats[$i] = 1;
            $count++;
        }
    }


    return $count;
}

print_r(maxSeating([0, 0, 0, 1, 0, 0, 1, 0, 0, 0]));
// output = 2
// [1, 0, 0, 1, 0, 0, 1, 0, 0, 1] 2 new people were seated!

print_r(PHP_EOL);
print_r(maxSeating([0, 0, 0, 0]));
// output = 2
// [1, 0, 0, 1] 2 new people were seated!

print_r(PHP_EOL);
print_r(maxSeating([1, 0, 0, 0, 0, 1]));
// output = 0
// There is no way to have a gap of at least 2 chairs when adding someone else.

print_r(PHP_EOL);
print_r(maxSeating([0, 0, 0, 1, 0, 0, 1, 0, 0, 0]));
// output = 2

print_r(PHP_EOL);
print_r(maxSeating([0, 0, 0, 0, 0, 0, 0, 0, 0, 0]));
// output = 4
