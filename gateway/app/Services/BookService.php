<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class BookService
{
	use ConsumesExternalService;
	/**
	 * The base uri to use to consum the authors service
	 * @var string
	 */
	public $baseUri;

	function __construct()
	{
		$this->baseUri = config('services.books.base_uri');
	}
}