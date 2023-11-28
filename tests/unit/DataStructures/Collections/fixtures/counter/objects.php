<?php

$a = new stdClass();
$a->t = 1;
$b = new stdClass();
$b->t = 2;
$c = new stdClass();
$c->t = 3;

return [
    'insertData' => [
        [$a, $a, $a],
        [$b, $b],
        [$c]
    ],
    'removeData' => [
        [$a],
        [$b],
        [$c, $c]
    ],
    'objects' => [$a, $b, $c],
    'expectations' => [2, 1, -1]
];
