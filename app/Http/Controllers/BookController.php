<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Isbn;
use App\Models\Author;
use App\Events\BookCreated;
use Illuminate\Http\Request;
use App\Services\OpenLibrary;
use Illuminate\Support\Facades\DB;
use App\Repositories\BookRepository;
use App\Http\Requests\StoreBook;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BookRepository $bookRepo)
    {
        // $booksList = Book::all();
        $booksList = $bookRepo->getAll();

        return view('books.list', ['booksList' => $booksList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(BookRepository $bookRepo)
    {
        \App::setlocale(session('locale'));
        $authors = Author::all();

        return view('books.create', ['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBook $request, BookRepository $bookRepo)
    {
        $data = $request->all();
        $book = $bookRepo->create($data);
        event(new BookCreated($book));

        return redirect('books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(OpenLibrary $ol, BookRepository $bookRepo, $id)
    {
        // $book = Book::find($id);
        $book = $bookRepo->find($id);
        $openLibData = $ol->search($book->name);
        $data = json_decode($openLibData);
        $docs = array_slice($data->docs, 0, 5);

        return view('books.show', [
            'book' => $book,
            'docs' => $docs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BookRepository $bookRepo, $id)
    {
        $book = $bookRepo->find($id);
        $authors = Author::all();

        return view('books.edit', [
            'book' => $book,
            'authors' => $authors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookRepository $bookRepo, $id)
    {
        $data = $request->all();
        $booksList = $bookRepo->update($data, $id);

        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookRepository $bookRepo, $id)
    {
        // Book::destroy($id);
        $booksList = $bookRepo->delete($id);

        return redirect('books');
    }

    public function cheapest(BookRepository $bookRepo)
    {
        // $booksList = DB::table('books')->orderBy('price', 'asc')->limit(3)->get();
        $booksList = $bookRepo->cheapest();

        return view('books.list', ['booksList' => $booksList]);
    }

    public function longest(BookRepository $bookRepo)
    {
        // $booksList = DB::table('books')->orderBy('pages', 'desc')->limit(3)->get();
        $booksList = $bookRepo->longest();

        return view('books.list', ['booksList' => $booksList]);
    }

    public function search(Request $request, BookRepository $bookRepo)
    {
        $q = $request->input('q', '');
        // $booksList = DB::table('books')->where('name', 'like', "%$q%")->get();
        $booksList = $bookRepo->search($q);

        return view('books.list', ['booksList' => $booksList]);
    }
}
