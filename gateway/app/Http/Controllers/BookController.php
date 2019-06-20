<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;

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
     * Retrieve and show all the book
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Create an instance of book
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Obtain and show an istance of book
     * @param  [type] $id [description]
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Updated an instance of book
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove an instance of book
     * @param  [type] $id [description]
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
