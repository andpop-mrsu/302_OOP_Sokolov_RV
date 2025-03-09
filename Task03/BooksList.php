<?php

namespace Task03\BooksList;

class BooksList
{
    private $books = [];

    public function __construct(Book $book)
    {
        array_push($this->books, $book);
    }

    public function add(Book $book)
    {
        array_push($this->books, $book);
        return $this;
    }

    public function count(): int
    {
        return count($this->books);
    }

    public function get(int $n): Book
    {
        return $this->books[$n];
    }

    public function store(string $fileName)
    {
        $serializedData = serialize($this->books);

        // Пытаемся записать данные в файл
        $result = file_put_contents($fileName, $serializedData, LOCK_EX);

        // Проверяем на ошибки
        if ($result === false) {
            throw new RuntimeException("Ошибка при записи в файл: $fileName");
        }
    }

    public function load(string $fileName)
    {
        try {
            if (!file_exists($fileName)) {
                throw new RuntimeException("Файл не найден");
            }

            $data = file_get_contents($fileName);
            if ($data === false) {
                throw new RuntimeException("Ошибка чтения файла");
            }

            $books = unserialize($data);

            if (!is_array($books)) {
                throw new RuntimeException("Некорректный формат данных");
            }

            foreach ($books as $book) {
                if (!$book instanceof Book) {
                    throw new RuntimeException("Файл содержит некорректные объекты");
                }
            }

            echo "Данные успешно загружены!";
            $this->books = $books;
        } catch (RuntimeException $e) {
            echo "Ошибка: " . $e->getMessage();
        }
    }
}
