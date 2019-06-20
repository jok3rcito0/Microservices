<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the author service
     * @var AuthorService
     */
    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Retrieve and show all the author
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->authorService->obtainAuthors());
    }

    /**
     * Create an instance of author
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->authorService->createAuthor($request->all()), Response::HTTP_CREATED);
    }

    /**
     * Obtain and show an istance of author
     * @param  [type] $id [description]
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->successResponse($this->authorService->obtainAuthor($id));
    }

    /**
     * Updated an instance of author
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->successResponse($this->authorService->editAuthor($request->all(), $id));
    }

    /**
     * Removes an instance of author
     * @param  [type] $id [description]
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->successResponse($this->authorService->deleteAuthor($id));
    }
}
