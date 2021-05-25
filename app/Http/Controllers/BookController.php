<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Isbn;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\BookRepository;

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
        $authors = Author::all();

        return view('books.create', ['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, BookRepository $bookRepo)
    {
        $data = $request->all();
        $booksList = $bookRepo->create($data);

        // $isbn = new Isbn([
        //     'number' => '987654321',
        //     'issued_by' => 'Wydawca',
        //     'issued_on' => '2018-01-20'
        // ]);
        // $book->isbn()->save($isbn);

        return redirect('books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BookRepository $bookRepo, $id)
    {
        // $book = Book::find($id);
        $book = $bookRepo->find($id);

        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $book = Book::find($id);
        // $book->name = 'Serce Europay';
        // $book->save();

        $data = [
            'name' => 'Quo Vadis',
            'year' => 2001,
            'publication_place' => 'Warszawa',
            'pages' => 650,
            'price' => 59.99
        ];
        $booksList = $bookRepo->update($data, $id);

        return redirect('books');
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
