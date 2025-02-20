<?php

declare(strict_types=1);

use Task02\Vector;

function runTest(): void
{
   // String representation test
   $v1 = new Vector(1, 2, 3);
   echo "Ожидается: (1; 2; 3)" . PHP_EOL;
   echo "Получено: " . $v1 . PHP_EOL;
   echo PHP_EOL;

   // Adding test
   $v2 = new Vector(1, 4, -2);
   $v3 = $v1->add($v2);
   echo "Ожидается: (2; 6; 1)" . PHP_EOL;
   echo "Получено: " . $v3 . PHP_EOL;
   echo PHP_EOL;

   //Subtracting test
   $v4 = $v1->sub($v3);
   echo "Ожидается: (-1; -4; 2)" . PHP_EOL;
   echo "Получено: " . $v4 . PHP_EOL;
   echo PHP_EOL;

   //Number multiplication test
   $v5 = $v1->product(5);
   echo "Ожидается: (5; 10; 15)" . PHP_EOL;
   echo "Получено: " . $v5 . PHP_EOL;
   echo PHP_EOL;

   //Dot product test
   $scalar = $v1->scalarProduct($v2);  
   echo "Ожидается: 3" . PHP_EOL;
   echo "Получено: " . $scalar . PHP_EOL;
   echo PHP_EOL;

   //Cross product test
   $v6 = $v1->vectorProduct($v2);
   echo "Ожидается: (-16; 5; 2)" . PHP_EOL;
   echo "Получено: " . $v6 . PHP_EOL;
   echo PHP_EOL;
} ?>