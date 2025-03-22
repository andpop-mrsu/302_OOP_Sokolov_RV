<?php

declare(strict_types=1);

use App\Stack;

function runTest()
{

    //Constructor test
    $steck1 = new Stack(1, 10, 100);
    $correct = '100->10->1';
    echo 'Ожидается: '  . PHP_EOL . $correct . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $steck1 . PHP_EOL;
    if ($steck1 == $correct) {
        echo "Тест успешно пройден" . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL;
    }


    $steck1 = new Stack(1, 2, 3);
    $correct = '3->2->1';
    echo 'Ожидается: '  . PHP_EOL . $correct . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $steck1 . PHP_EOL;
    if ($steck1 == $correct) {
        echo "Тест успешно пройден" . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL;
    }

    //Addition (push) test
    $steck1->push(4, 5);
    $correct = '5->4->3->2->1';
    echo 'Ожидается: '  . PHP_EOL . $correct . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $steck1 . PHP_EOL;
    if ($steck1 == $correct) {
        echo "Тест успешно пройден" . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL;
    }

    //Deletion (pop) test
    $element = $steck1->pop();
    $correct = '4->3->2->1';
    echo 'Ожидается: '  . PHP_EOL . $correct . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $steck1 . PHP_EOL;
    if ($steck1 == $correct) {
        echo "Тест успешно пройден" . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL;
    }

    $correct = '5';
    echo 'Ожидается: '  . PHP_EOL . $correct . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $element . PHP_EOL;
    if ($element == $correct) {
        echo "Тест успешно пройден" . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL;
    }

    //Top test
    $element = $steck1->top();
    $correct = '4->3->2->1';
    echo 'Ожидается: '  . PHP_EOL . $correct . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $steck1 . PHP_EOL;
    if ($steck1 == $correct) {
        echo "Тест успешно пройден" . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL;
    }

    $correct = '4';
    echo 'Ожидается: '  . PHP_EOL . $correct . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $element . PHP_EOL;
    if ($element == $correct) {
        echo "Тест успешно пройден" . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL;
    }

    //Emplty test
    $element = $steck1->isEmpty();
    $correct = false;
    if ($element == $correct) {
        echo "Тест успешно пройден" . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL;
    }
    $steck1->pop();
    $steck1->pop();
    $steck1->pop();
    $steck1->pop();
    $element = $steck1->isEmpty();
    echo $steck1;
    $correct = true;
    if ($element == $correct) {
        echo "Тест успешно пройден" . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL;
    }

    // String representation test
    $steck1 = new Stack(1, 2);
    $steck2 = $steck1->copy();
    echo 'Ожидается: '  . PHP_EOL . $steck1 . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $steck2 . PHP_EOL;
    if ($steck1 == $steck2) {
        echo "Тест успешно пройден" . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL;
    }
    $steck1->pop();
    echo 'Ожидается: '  . PHP_EOL . $steck2 . PHP_EOL;
    echo 'Получено: ' . PHP_EOL . $steck2 . PHP_EOL;
    if ($steck1 != $steck2) {
        echo "Тест успешно пройден" . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL;
    }
    //compareStrings test
    if (compareStrings("ab#c", "ade##c")) {
        echo "Тест успешно пройден" . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL;
    }


    if (compareStrings("a#c", "c")) {
        echo "Тест успешно пройден" . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL;
    }

    if (compareStrings("abc###", "a#b#")) {
        echo "Тест успешно пройден" . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL;
    }
}
