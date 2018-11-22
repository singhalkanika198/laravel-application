<?php

namespace App\Model\Book;

use App\Model\Book\Book;
use \App\Exceptions\BookNotFoundException;
use Config;
use Log;

class CategoryBooksRepository
{
    protected $book = null;
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function create($attributes)
    {
        return $this->book->create($attributes);
    }

    public function all($pageNumber, $count)
    {
        Log::info('mc nmvnmvmnvvcnnvc');
        Log::info($this->book->all());
        return $this->book->all()->forPage($pageNumber, $count);
    }

    public function find($id)
    {
        $book = $this->book->find($id);
        if($book === null) {
            throw new BookNotFoundException("Book not found");
        }
        return $book;
    }

    public function update($id, array $attributes)
    {
        Log::info($this->find($id)->update($attributes));
        $this->find($id)->update($attributes);
        return $this->find($id);
    }

    public function delete($id)
    {
        return $this->find($id)->delete();
    }
}