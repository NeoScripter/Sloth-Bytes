<?php

function overlap(string $word1, string $word2) 
{
    if (empty($word1)) {
        return $word2;
    }
    if (empty($word2)) {
        return $word1;
    }

    $len1 = strlen($word1);
    $len2 = strlen($word2);
    $maxOverlap = min($len1, $len2);

    for ($overlapLen = $maxOverlap; $overlapLen >= 1; $overlapLen--) {
        $suffix = substr($word1, -$overlapLen);
        $prefix = substr($word2, 0, $overlapLen);

        if ($suffix === $prefix) {
            return $word1 . substr($word2, $overlapLen);
        }
    }

    return $word1 . $word2;
}

print_r(overlap("sweden", "denmark"));
// output = "swedenmark"
print_r(PHP_EOL);
print_r(overlap("honey", "milk"));
// output = "honeymilk"

print_r(PHP_EOL);
print_r(overlap("dodge", "dodge"));
// "dodge"
