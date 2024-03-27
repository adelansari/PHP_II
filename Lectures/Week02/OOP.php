<?php
class Book
{
    private $title;
    private $author;
    private $isbn;

    // Constructor
    public function __construct($title = null, $author = null, $isbn = null)
    {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
    }

    // Getters
    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getIsbn()
    {
        return $this->isbn;
    }

    // Setters
    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    // Display book details
    public function displayBookDetails($bookName)
    {
        echo "• $bookName: Title: {$this->getTitle()}, Author: {$this->getAuthor()}, ISBN: {$this->getIsbn()}\n";
    }
}

// Usage

// using getter
$book1 = new Book("The Influence of social media.", "Elon Flusk", "978-0451524935");
$book2 = new Book("The science behind reserve system.", "Pablo", "978-0446310789");

// using setter
$book3 = new Book();
$book3->setTitle("What in the world is going on?");
$book3->setAuthor("Mark Twain");
$book3->setIsbn("978-0486408845");

// Display book details
$books = [
    'Book 1' => $book1,
    'Book 2' => $book2,
    'Book 3' => $book3,
];

foreach ($books as $bookName => $book) {
    $book->displayBookDetails($bookName);
}
