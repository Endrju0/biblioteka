<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authorsList = Author::all();

        return view('authors.list', ['authorsList' => $authorsList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $author = new Author();
        $author->lastname = 'Straub';
        $author->firstname = 'Peter';
        $author->birthday = '1943-03-02';
        $author->genres = 'horror, thriller';
        $author->save();

        $authorSecond = new Author();
        $authorSecond->lastname = 'King';
        $authorSecond->firstname = 'Stephen';
        $authorSecond->birthday = '1947-09-21';
        $authorSecond->genres = 'horror, thriller';
        $authorSecond->save();


        $czarnyDom = Book::where('name', 'Czarny Dom')->first();
        $czarnyDom->authors()->attach($author);
        $czarnyDom->authors()->attach($authorSecond);
        // $czarnyDom->authors()->sync([1,2,3]);

        // $book = new Book();
        // $book->name = 'Czarny Dom';
        // $book->year = 2010;
        // $book->publication_place = 'Warszawa';
        // $book->pages = 648;
        // $book->price = 59.99;
        // $book->save();

        return redirect('books');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
