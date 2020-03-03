<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.index');
    }

    public function getBooks(Request $request)
    {
        $page_size = $request->get('size') ?: 12;
        $current_page = $request->get('page') ?: 1;
        return Book::paginate($page_size, '*', 'page', $current_page);
    }

    public function books(Request $request)
    {
        return response()->json(['books' => $this->getBooks($request)->toArray()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Request $request)
    {
        $id = $request->get('id');
        if ($id) {
            $book = Book::find($id);
            return response()->json(['book' => $book->toArray()]);
        }
        return response()->json(['message' => 'Book id is missing']);
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $search = $request->get('search');
        if ($search) {
            $page_size = $request->get('page_size') ?: 12;
            $current_page = $request->get('current_page') ?: 1;
            $books = Book::orWhere('title', 'like', '%' . $search . '%')
                ->orWhere('author', 'like', '%' . $search . '%')
                ->orderBy('id', 'desc')
                ->paginate($page_size, '*', 'page', $current_page);
            return response()->json([
                'books' => $books->toArray()
            ]);
        }
        return response()->json(['message' => 'Search missing!'], 400);
    }
}
