<?php

class Test
{
    protected $t;

    public function __construct($t)
    {
        $this->t = $t;
    }
}
$a = new Test(1);
$b = new Test(2);
$c = new Test(3);

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
