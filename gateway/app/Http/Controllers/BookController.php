<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the book service
     * @var BookService
     */
    public $bookService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Retrieve and show all the book
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }

    /**
     * Create an instance of book
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->bookService->createBook($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Obtain and show an istance of book
     * @param  [type] $id [description]
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->successResponse($this->bookService->obtainBook($id));
    }

    /**
     * Updated an instance of book
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->bookService->editBook($request->all(), $id));
    }

    /**
     * Removes an instance of book
     * @param  [type] $id [description]
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->successResponse($this->bookService->deleteBook($id));
    }
}
