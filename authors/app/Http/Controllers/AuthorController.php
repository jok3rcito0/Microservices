<?php

namespace App\Http\Controllers;

use App\Author;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
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
     * Return authors list
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();

        return $this->successResponse($authors);

    }

    /**
     * Create an instance of Author
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|in:male,female',
            'country' => 'required|string|max:255'
        ];

        if($this->validate($request, $rules)){
            $author = Author::create($request->all());
            return $this->successResponse($author, Response::HTTP_CREATED);
        }else{
            dd('no paso');
        }
    }

    /**
     * Return an specific author data
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::findOrFail($id);

        if($author){
            return  $this->successResponse($author);
        }else{
            dd('error');
        }
    }

    /**
     * Update the information from an existing author
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove an existing author
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
