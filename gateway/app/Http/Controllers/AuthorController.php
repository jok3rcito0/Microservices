<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;

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
     * Retrieve and show all the author
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Create an instance of author
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Obtain and show an istance of author
     * @param  [type] $id [description]
     * @return Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Updated an instance of author
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove an instance of author
     * @param  [type] $id [description]
     * @return Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
