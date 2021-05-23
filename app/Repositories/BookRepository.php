<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository extends BaseRepository {

    public function __construct(Book $model)
    {
        $this->model = $model;
    }

    public function cheapest()
    {
        $booksList = $this->model->orderBy('price', 'asc')->limit(3)->get();

        return $booksList;
    }

    public function longest()
    {
        $booksList = $this->model->orderBy('pages', 'desc')->limit(3)->get();

        return $booksList;
    }

    public function search(String $q)
    {    
        $booksList = $this->model->where('name', 'like', "%$q%")->get();

        return $booksList;
    }
}