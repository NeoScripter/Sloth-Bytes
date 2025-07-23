<?php


function is_authentic_skewer(string $s): bool
{
    $vowels = ['A', 'E', 'I', 'O', 'U'];
    $n = strlen($s);

    if (in_array($s[0], [...$vowels, '-']) || in_array($s[$n - 1], [...$vowels, '-'])) {
        return false;
    }


    $shouldBeVowel = false;
    for ($i = 0; $i < $n; $i++) {
        $char = $s[$i];

        if ($char === '-') {
            continue;
        }

        if (in_array($char, $vowels) !== $shouldBeVowel) {
            return false;
        }

        $shouldBeVowel = !$shouldBeVowel;
    }

    $lastCount = null;
    for ($i = 0; $i < $n;) {
        if ($s[$i] !== '-') {
            $i++;
            continue;
        }

        $start = $i;
        while ($i < $n && $s[$i] === '-') {
            $i++;
        }
        $count = $i - $start;

        if ($lastCount !== null && $count !== $lastCount) {
            return false;
        }

        $lastCount = $count;
    }

    return true;
}

function run_test(string $input, bool $expected, string $description): void
{
    $result = is_authentic_skewer($input);
    $status = $result === $expected ? "✅ PASSED" : "❌ FAILED";
    echo "$status: $description | input: \"$input\" | expected: " . ($expected ? "true" : "false") . ", got: " . ($result ? "true" : "false") . "\n";
}

run_test("B--A--N--A--N--A--S", true, "Authentic skewer");
run_test("A--X--E", false, "Should start and end with a consonant");
run_test("C-L-A-P", false, "Should alternate between consonants and vowels");
run_test("M--A---T-E-S", false, "Hyphen pattern invalid");
