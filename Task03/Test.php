<?php

declare(strict_types=1);

function runTest(): void
{
   // String representation test
    $book1 = new Book("Название книги", "Автор книги", "Издательство", 2021);
    $correct = "Id: 1" . PHP_EOL . "Название: Название книги" . PHP_EOL . "Автор1: Автор книги" . PHP_EOL . "Издательство: Издательство" . PHP_EOL . "Год: 2021" . PHP_EOL;
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $book1->__toString() . PHP_EOL . PHP_EOL;

    if ($book1->__toString() == $correct) {
        echo "Тест успешно пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

   // Setters test
    $book1->setTitle("Новое название")->setAuthor("Новый автор")->setPublisher("Новое издательство")->setYear(2022);
    $correct = "Id: 1" . PHP_EOL . "Название: Новое название" . PHP_EOL . "Автор1: Новый автор" . PHP_EOL . "Издательство: Новое издательство" . PHP_EOL . "Год: 2022" . PHP_EOL;
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $book1->__toString() . PHP_EOL . PHP_EOL;

    if ($book1->__toString() == $correct) {
        echo "Тест успешно пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

   // Getters test
    $correct = "1";
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $book1->getId() . PHP_EOL . PHP_EOL;

    if ($book1->getId() == $correct) {
        echo "Тест успешно пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    $correct = "Новое название";
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $book1->getTitle() . PHP_EOL . PHP_EOL;

    if ($book1->getTitle() == $correct) {
        echo "Тест успешно пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    $correct = "Автор1: Новый автор";
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $book1->getAuthor() . PHP_EOL . PHP_EOL;

    if ($book1->getAuthor() == $correct) {
        echo "Тест успешно пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    $correct = "Новое издательство";
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $book1->getPublisher() . PHP_EOL . PHP_EOL;

    if ($book1->getPublisher() == $correct) {
        echo "Тест успешно пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    $correct = "2022";
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $book1->getYear() . PHP_EOL . PHP_EOL;

    if ($book1->getYear() == $correct) {
        echo "Тест успешно пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    $book2 = new Book("Книга 2", "Автор 2", "Издательство 2", 2022);

    $booksList = new BooksList($book1);
    $booksList->add($book2);

    $correct1 = "Id: 1" . PHP_EOL . "Название: Новое название" . PHP_EOL . "Автор1: Новый автор" . PHP_EOL . "Издательство: Новое издательство" . PHP_EOL . "Год: 2022" . PHP_EOL;
    $correct2 = "Id: 2" . PHP_EOL . "Название: Книга 2" . PHP_EOL . "Автор1: Автор 2" . PHP_EOL . "Издательство: Издательство 2" . PHP_EOL . "Год: 2022" . PHP_EOL;

    echo "Ожидается:\n$correct1" . PHP_EOL . $correct2 . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $booksList->get(0)->__toString() . PHP_EOL . $booksList->get(1)->__toString() . PHP_EOL . PHP_EOL;

    if ($booksList->get(0)->__toString() == $correct1 && $booksList->get(1)->__toString() == $correct2) {
        echo "Тест успешно пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    echo "Ожидается:\n$correct2" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $booksList->get(1)->__toString() . PHP_EOL . PHP_EOL;

    if ($booksList->get(1)->__toString() == $correct2) {
        echo "Тест успешно пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

   // Count test
    $correct = "2";
    echo "Ожидается:\n$correct" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $booksList->count() . PHP_EOL . PHP_EOL;

    if (strval($booksList->count()) == $correct) {
        echo "Тест успешно пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

   // Store and load test
    $booksList->store("BooksList");
    $newBooksList = new BooksList($book1);
    $newBooksList->load("BooksList");

    echo "\n";

    echo "Ожидается:\n$correct1" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $newBooksList->get(0)->__toString() . PHP_EOL . PHP_EOL;

    if ($newBooksList->get(0)->__toString() == $correct1) {
        echo "Тест успешно пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    echo "Ожидается:\n$correct2" . PHP_EOL . PHP_EOL;
    echo "Получено:\n" . $newBooksList->get(1)->__toString() . PHP_EOL . PHP_EOL;

    if ($newBooksList->get(1)->__toString() == $correct2) {
        echo "Тест успешно пройден" . PHP_EOL . PHP_EOL . PHP_EOL;
    } else {
        echo "Тест провален" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

   // Clean up
    unlink("BooksList");
}
