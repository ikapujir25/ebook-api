<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;
use JWTAuth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Book::all(); => ini bentuk lain dari yang index
        $book = Book::all();
        if($book && $book->count()){
            return response(["message" => "Show data success", "data" => $book], 200);
        }else{
            return response(["message" => "Data not found", "data" => null ], 404);
        }
    }

    public function __construct() {
        $this->middleware('auth:api');
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
        $book = Book::create([
            "tittle" => $request -> tittle,
            "description" => $request -> description,
            "author" => $request -> author,
            "publisher" => $request -> publisher,
            "date_of_issue" => $request -> date_of_issue,
        ]);
        return response(["message" => "Create data success", "data" => $book], 201);
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
        $book = Book::find($id);
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
        $book = Book::find($id)->update([
            "tittle" => $request -> tittle,
            "description" => $request -> description,
            "author" => $request -> author,
            "publisher" => $request -> publisher,
            "date_of_issue" => $request -> date_of_issue,
        ]);
        return response(["message" => "Update data success", "data" => $book], 201);
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
        $book = Book::destroy($id);
        return response(["message" => "Delete data success", "data" => $book], 201);
    }
}
/*
    Cara mengecek versi laravel:
    1. buka file composer.json
    2. buka gitbash dengan perintah php artisan version
    Perintah php artisan route:list = mengecek route yang dijalankan
 */