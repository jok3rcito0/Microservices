<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
	use ConsumesExternalService;
	/**
	 * The base uri to use to consum the books service
	 * @var string
	 */
	public $base_uri;

	public function __construct()
	{
		$this->base_uri = config('services.books.base_uri');
	}

	/**
	 * Get the full list of books from the books service
	 * @return string
	 */
	public function obtainBooks($page=1)
	{
		return $this->performRequest('GET', "/books?page={$page}");
	}

	/**
	 * Create an instance of book using the books service
	 * @return string
	 */
	public function createBook($data)
	{
		return $this->performRequest('POST', '/books', $data);
	}

	/**
	 * Get a single book from the books service
	 * @return string
	 */
	public function obtainBook($id)
	{
		return $this->performRequest('GET', "/books/{$id}");
	}

	/**
	 * Edit a single book from the books service
	 * @return string
	 */
	public function editBook($data, $id)
	{
		return $this->performRequest('PUT', "/books/{$id}", $data);
	}

	/**
	 * Remove a single book from the books service
	 * @return string
	 */
	public function deleteBook($id)
	{
		return $this->performRequest('DELETE', "/books/{$id}");
	}
}