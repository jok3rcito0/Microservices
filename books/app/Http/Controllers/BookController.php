<?php

namespace App\Http\Controllers;

use App\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return books list
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::simplePaginate(30);

        return $this->successResponse($books);
    }

    /**
     * Create an instance of book
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'author_id' => 'required|min:1',
            'title'     => 'required|string|max:255',
            'price'     => 'required|numeric|min:1',
            'description' => 'string|max:255',

        ];

        $this->validate($request, $rules);

        $book = Book::create($request->all());

        return $this->successResponse($book, Response::HTTP_CREATED);
    }

    /**
     * Return an specific book data
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);

        if($book){
            return $this->successResponse($book);
        }
    }

    /**
     * Update the information from an existing book
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'author_id'   => 'min:1',
            'title'       => 'string|max:255',
            'price'       => 'numeric|min:1',
            'description' => 'string|max:255',

        ];
        $this->validate($request, $rules);
        $book = Book::findOrFail($id);

        $book->fill($request->all());

        if($book->isClean()){
            $response = $this->errorResponse('At least one value must be change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }else{
            $book->save();
            $response = $this->successResponse($book);
        }

        return $response;
    }

    /**
     * Remove an existing book
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return $this->successResponse($book);
    }

}
