<?php

declare(strict_types=1);

namespace Task03;

class Book
{
    private static $nextId = 1;
    private int $id;
    private string $title;
    private $author = [];
    private string $publisher;
    private int $year;

    public function __construct(string $title, string $author, string $publisher, int $year)
    {
        if (!is_numeric($year)) {
            throw new \InvalidArgumentException('Год должен быть числом');
        }
        $this->id = self::$nextId++;
        $this->title = $title;
        array_push($this->author, $author);
        $this->publisher = $publisher;
        $this->year = $year;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        $authors = [];
        foreach ($this->author as $index => $author) {
            $authors[] = "Автор" . ($index + 1) . ": " . $author;
        }
        return implode(PHP_EOL, $authors);
    }

    public function getPublisher(): string
    {
        return $this->publisher;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function setAuthor(string ...$authors)
    {
        $this->author = [];
        foreach ($authors as $str) {
            if (!is_string($str)) {
                throw new InvalidArgumentException("Все элементы должны быть строками!");
            } else {
                array_push($this->author, $str);
            }
        }
        return $this;
    }

    public function setPublisher(string $publisher)
    {
        $this->publisher = $publisher;
        return $this;
    }

    public function setYear(int $year)
    {
        if (!is_numeric($year)) {
            throw new \InvalidArgumentException('Год должен быть числом');
        }
        $this->year = $year;
        return $this;
    }

    public function __toString(): string
    {
        $format = "Id: %s"
        . PHP_EOL . "Название: %s"
        . PHP_EOL . $this->getAuthor()
        . PHP_EOL . "Издательство: %s"
        . PHP_EOL . "Год: %s" . PHP_EOL;
        $formatted = sprintf($format, $this->id, $this->title, $this->publisher, $this->year);
        return $formatted;
    }
}
